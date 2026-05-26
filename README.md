# JobYaari Blog Management System

A full-stack, responsive Blog Management System built with Laravel, featuring a dynamic frontend, a secure admin panel, and mandatory AJAX filtering without page reloads.

## Features

- **Dynamic Frontend:** Fully responsive blog listing and detailed reading pages.
- **AJAX Filtering:** Real-time, zero-reload blog filtering by Category and Date using jQuery and AJAX.
- **Admin Dashboard:** Secure backend to Add, Edit, and Delete blogs.
- **Image Handling:** Dynamic image upload and storage system.
- **Modern UI:** Clean, polished interface utilizing modern CSS and Google Fonts.

## Tech Stack Used

- **Backend:** PHP 8.x, Laravel, MySQL
- **Frontend:** HTML5, CSS3, Blade Templating
- **Interactivity:** JavaScript, jQuery, AJAX

## Setup Steps (Local Development)

1. Clone the repository: `git clone [your-repo-link]`
2. Navigate into the directory: `cd blog-system`
3. Install dependencies: `composer install`
4. Copy the environment file: `cp .env.example .env`
5. Generate the app key: `php artisan key:generate`
6. Configure your `.env` file with your local MySQL database credentials.
7. Run migrations: `php artisan migrate`
8. Link the storage directory: `php artisan storage:link`
9. Start the local server: `php artisan serve`
