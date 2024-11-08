# PassSecure - README

## Overview

This is a simple Laravel application designed to securely share sensitive data (referred to as "secrets") with an optional expiration time and usage limit. The application enables users to create secrets, generate signed URLs, and share them with others while maintaining control over how long the secret is available and how many times it can be accessed.

## Features

- **Expiration**: Set an expiration time for each secret, either in hours or minutes.
- **Usage Limit**: Control the number of times a secret can be accessed before it is automatically deleted.
- **Signed URLs**: Generate secure, time-limited URLs to access the secret.
- **Encryption**: All secrets are stored and shared securely with Laravel's built-in encryption.

## Installation

### Prerequisites

- PHP >= 8.0
- Laravel 11.x
- Composer
- A MySQL database
- Node.js and npm for Tailwind CSS build

### Steps

1. **Clone the repository**:
   ```bash
   git clone <your-repository-url>
   cd <your-repository-folder>
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Set up the environment file**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Set up the database**:
    - Update your `.env` file with the correct database configuration.
    - Run migrations to create the necessary tables:
      ```bash
      php artisan migrate
      ```

5. **Build the frontend**:
   If you are using Tailwind CSS, install frontend dependencies and compile assets:
   ```bash
   npm install
   npm run dev
   ```

6. **Run the application**:
   Start the Laravel development server:
   ```bash
   php artisan serve
   ```

   You can now visit the application at `http://localhost:8000`.

## How It Works

### Routes

- **GET `/share-secret`**: Displays the form to create a new secret.
- **POST `/share-secret`**: Handles form submission and creates a new secret in the database.
- **GET `/secret/{secret}`**: Shows the secret using a signed URL. If the secret has expired or exceeded its usage limit, an error page will be displayed.
- **GET `/secret/created`**: Displays a confirmation page after a secret is successfully created.

### Cron Job

The `app:delete-expired-secrets` command is set to run every hour to automatically delete expired secrets from the database. Ensure your cron job is set up to run Laravel's scheduler:
```bash
php artisan schedule:run
```

### Controllers

#### SecretShareController
- **index()**: Returns the form view for sharing a new secret.
- **store()**: Handles the creation of a new secret, including validation and URL generation.
- **show()**: Displays the secret to the user, decrements usage, and handles expiration.
- **created()**: Shows the confirmation page with the secret's details.

#### DeleteExpiredSecrets Command
This command deletes all expired secrets from the database based on the `expiresAt` field.

## Database Schema

The secrets table contains the following fields:
- `id`: Primary key.
- `secret`: The sensitive data to be shared.
- `usageAmount`: The number of times the secret can be accessed.
- `expiresAt`: The date and time when the secret expires.
- `created_at`: Timestamp when the secret was created.
- `updated_at`: Timestamp for updates to the secret.

## Tailwind CSS

The application uses Tailwind CSS for styling. The main features include:
- **Responsive Layout**: The pages adjust seamlessly for different screen sizes.
- **UI Components**: Various Tailwind UI components are used to ensure a clean and modern design.

## Console Command

The `DeleteExpiredSecrets` command deletes expired secrets from the database. This command is scheduled to run every hour.

### Command Signature:
```bash
php artisan app:delete-expired-secrets
```

### Logs:
The command will log the number of deleted secrets in the application log.

## Contribution

Feel free to fork the repository and contribute. If you want to add new features or improve the app, feel free to open a pull request.

---

### License

This project is open-source and under no license.
