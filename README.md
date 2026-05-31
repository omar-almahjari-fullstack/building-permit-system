<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<!--
    Project README: Building Permit Management System
-->

# Building Permit Management System

A web-based system built with Laravel for managing building permit applications, including user-facing interfaces for submitting requests, tracking status, and generating reports.

---

## Project Description

This system allows users to submit building permit applications, track their status, and generate summarized and detailed reports. It includes the following features:

- User registration and authentication system.
- Complete online application form (attachments, location data, owner information).
- Dashboard for viewing and managing user requests.
- Generation and export of PDF reports (summary and detailed).
- Notifications and activity logging system.

---

## Key Features

- User and role management
- Application submission and tracking
- File attachments per request
- PDF report generation and printing

---

## Screenshots

Home Page:

![Home](resources/assets/images/Home.png)

Request Page:

![Request](resources/assets/images/Request.png)

Report Example:

![Report](resources/assets/images/Report.png)

---

## Important Files

- Report Controller: `app/Http/Controllers/ReportController.php`
- Report Views: `resources/views/modules/auth/reports/`
- Attachments Storage: `storage/attachments/`

---

## Contributing

If you would like to contribute or report an issue, feel free to open an Issue or submit a Pull Request on the project repository.

---

## License

Open-source project — see `composer.json` and repository files for more details.
