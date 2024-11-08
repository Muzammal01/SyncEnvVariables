# SyncEnvVariables

[![Latest Version on Packagist](https://img.shields.io/packagist/v/muzammal/syncenvvariables.svg?style=flat-square)](https://packagist.org/packages/muzammal/syncenvvariables)
[![Total Downloads](https://img.shields.io/packagist/dt/muzammal/syncenvvariables.svg?style=flat-square)](https://packagist.org/packages/muzammal/syncenvvariables)

**SyncEnvVariables** is a Laravel package designed to help teams keep their `.env` files synchronized with the `.env.example` file. 🔄 By running a simple command, you can automatically update your local `.env` file to include any new environment variables defined in `.env.example`, saving time and reducing configuration errors.

---

## ✨ Features

- 📋 **Auto-sync missing environment variables:** Ensures your `.env` file includes all variables listed in `.env.example`.
- 🔄 **Improved team collaboration:** Keeps all developers up-to-date with the latest environment variables.
- 🛠️ **Seamless integration:** Simple to install and use within any Laravel project.

---

## 🚀 Installation

1. **Install the package via Composer:**

   ```bash
   composer require muzammal/syncenvvariables
   ```

---

## 📘 Usage

This package provides a `sync:env` Artisan command, which checks your `.env.example` file for any new or missing environment variables and appends them to your `.env` file if they aren’t already present.

### Sync Environment Variables

Run the following command to sync the environment variables:

```bash
php artisan sync:env
```

This command will:

- Check your `.env.example` file and compare it to your `.env` file.
- Add any missing variables from `.env.example` to `.env`, keeping your local environment configuration consistent.

---

## 🔍 Example

Suppose your `.env.example` file includes new variables such as `API_KEY` and `APP_ENV`. When you run:

```bash
php artisan sync:env
```

The command will check for any missing variables in your `.env` file and automatically add them. This ensures all developers have the same set of environment configurations across different environments.

---

## 📜 License

This package is open-source software licensed under the MIT license.
