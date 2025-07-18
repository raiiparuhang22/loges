
# Admin User Management System

## Overview
This project is a simple admin user management system built using core PHP with Object-Oriented Programming (OOP) principles and Bootstrap for the front-end. It includes functionalities such as admin login, registration, user management (add, edit, delete), and session-based authentication with cache control to prevent unauthorized access.

## Features
- Admin registration and login with secure password hashing
- Session-based authentication and access control
- CRUD operations for users (Create, Read, Update, Delete)
- Protection of routes and pages for authenticated users only
- Prevention of browser caching after logout to secure session data
- Responsive UI using Bootstrap 5
- Clean and professional folder structure

## Folder Structure
```
/loges
|-- /config
|   |-- Database.php        # Database connection class
|-- /controllers
|   |-- AdminController.php
|   |-- UserController.php
|   |-- DashboardController.php
|-- /models
|   |-- Admin.php
|   |-- User.php
|-- /views
|   |-- /auth
|       |-- login.php
|       |-- register.php
|   |-- /dashboard
|       |-- index.php
|       |-- add_user.php
|       |-- edit_user.php
|   |-- /layout
|       |-- header.php
|       |-- footer.php
|-- /helpers
|   |-- Auth.php            # Authentication helper functions
|-- /routers
|   |-- web.php             # Router file handling page requests
|-- index.php               # Entry point
|-- logout.php              # Logout script
```

## Installation and Setup

1. Clone or download the repository.
2. Set up a local server environment such as XAMPP, WAMP, or MAMP.
3. Import the database schema (MySQL) for admins and users tables.
4. Update database credentials in `/config/Database.php`.
5. Place the project folder inside your server’s `htdocs` or equivalent.
6. Access the app via `http://localhost/loges/index.php`.

## Usage

- Visit `index.php?page=login` to log in as an admin.
- Register a new admin via `index.php?page=register`.
- Manage users via the dashboard after logging in.
- Add, edit, or delete users from the dashboard.
- Logout to securely end the session.

## Security

- Passwords are hashed using `password_hash()` and verified with `password_verify()`.
- Sessions are securely managed and destroyed on logout.
- Cache-control headers prevent browser caching of sensitive pages.
- Access to protected pages is restricted to authenticated admins only.

## Technologies Used

- PHP (Core, OOP)
- Bootstrap 5
- MySQL (Database)
- Apache/XAMPP (Local server)

## Contributing

Contributions are welcome. Please fork the repository and create a pull request for review.

## License

This project is open-source and available under the MIT License.

---

**Developed by Paruhang Rai**
