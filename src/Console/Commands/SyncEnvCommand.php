<?php

namespace Muzammal\SyncEnvVariables\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SyncEnvCommand extends Command
{
    protected $signature = 'sync:env';
    protected $description = 'Sync environment variables from .env.example to .env';

    public function handle()
    {
        $envPath = base_path('.env');
        $examplePath = base_path('.env.example');

        // Check if .env.example file exists
        if (!File::exists($examplePath)) {
            $this->error('.env.example file not found.');
            return;
        }

        // If .env file doesn't exist, copy .env.example to create it
        if (!File::exists($envPath)) {
            File::copy($examplePath, $envPath);
            $this->info('.env file created from .env.example');
            return;
        }

        // Load contents of both files
        $envContent = File::get($envPath);
        $exampleContent = File::get($examplePath);

        // Parse each file into lines and filter lines to get variables only
        $envVariables = $this->parseEnvFile($envContent);
        $exampleVariables = $this->parseEnvFile($exampleContent);

        // Find missing variables in .env by checking keys in .env.example
        $missingVariables = array_diff_key($exampleVariables, $envVariables);

        if (empty($missingVariables)) {
            $this->info('All environment variables are already synced.');
        } else {
            // Append missing variables to .env
            $newLines = [];
            foreach ($missingVariables as $key => $value) {
                $newLines[] = "{$key}={$value}";
                $this->info("Added missing variable: {$key}");
            }
            File::append($envPath, "\n" . implode("\n", $newLines));
            $this->info('Missing environment variables have been added to .env');
        }
    }

    /**
     * Parse the contents of an .env file into an associative array
     * ignoring comments and empty lines.
     *
     * @param string $content
     * @return array
     */
    protected function parseEnvFile($content)
    {
        $lines = explode("\n", $content);
        $variables = [];

        foreach ($lines as $line) {
            $line = trim($line);

            // Skip empty lines and comments
            if (empty($line) || str_starts_with($line, '#')) {
                continue;
            }

            // Parse key and value
            list($key, $value) = explode('=', $line, 2) + [null, null];
            $variables[$key] = $value;
        }

        return $variables;
    }
}
