# ICTC Events Management System

## Introduction

The ICTC Events Management System (EMS) is a comprehensive platform designed to streamline the management of events, including registration, ticketing, and event scheduling. It provides an intuitive interface for ICTC to manage their events efficiently.
### Key Features:

- **Event Registration**: Allows attendees to register online with various payment options.
- **Ticketing System**: Manages tickets for different events.
- **Scheduling Tools**: Helps in creating and managing event schedules.
- **Analytics Dashboard**: Provides insights into attendee behavior and event performance.

### Technologies Used:

- **Frontend**: HTML, Livewire, and Laravel 10.x
- **Backend**: PHP with Laravel 10.x
- **Database**: MariaDB 10.6.18
 
## Installation Guide

### Prerequisites:
Before starting the installation process, ensure you have:
- A local development environment set up (Laravel Forge or Docker).
- PHP and Laravel installed on your system _if not using Docker_.
- Composer for package management _if not using Docker_.


## Development Guide
### Running the project
1. Clone the repository
2. Install Docker and docker-compose
3. Navigate to the project directory in terminal
4. Run `docker-compose -f docker-compose.dev.yaml up -d` to start the development environment (database, database admin UI and mailpit)
5. Install required npm packages: `npm install`
6. Install composer packages: `composer install`
7. Start the assets development server: `npm run dev`
8. Start the php development server: `php artisan serve`
9. Run migrations: `php artisan migrate`
10. Start the queues: `php artisan queue:work --queue=default,control-numbers --tries=1`

### Generating [CHANGELOG.md](CHANGELOG.md)
1. Install `auto-changelog` globally: `npm install -g auto-changelog`
2. Run: `./release.sh v1.0.0` where `v1.0.0` is the version number


# After Setting Up
## Running Migrations
- `php artisan migrate`

## Setting Up Initial Roles
- `php artisan db:seed RolesSeeder`
