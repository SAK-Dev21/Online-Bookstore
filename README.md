# Online Bookstore – Web Development Project

## Overview

This repository contains the completed coursework for the Web Development module (5019CMD). The application is a functioning online bookstore built using HTML5, CSS3, JavaScript (ES6), PHP7, and MySQL. It supports both customer and admin functionality, offering a complete browsing, purchasing, and book management experience.

---

## User Roles and Features

### Customer
- Register a new account
- Log in and access personal account
- View the homepage, shop all books, and product detail pages
- Add books to the shopping basket
- Adjust quantities and remove items from the basket
- Proceed to checkout and view an order confirmation

### Admin
- Same privilages as customer
- Log in with admin credentials
- Access the admin dashboard (restricted to admin users)
- Add new books to the database using a form
- Edit or update existing books
- View a tabular overview of all books (stock levels, details)

---

## Technology Stack

- HTML5 and CSS3 for structure and styling
- JavaScript (ES6) for interactivity
- PHP7 for server-side logic and session handling
- MySQL for data storage (books and user accounts)
- Codio for hosting and submission
- XAMPP (used locally during development and testing due to Codio limitations)

---

## Project Structure

```
Online-Bookstore/
├── admin/                   # Admin-specific pages (dashboard, add/edit book)
├── authentication/          # Signup, login, logout, account pages
├── cart/                    # Cart operations (add, remove, cancel)
├── includes/                # Reusable components (header, footer, db_connect)
├── public/                  # Homepage, product pages, shop all books, checkout
├── assets/
│   ├── css/                 # Custom styling (styles.css, reset.css)
│   └── js/                  # Scripts for cart and page functionality
    └── images/
├── README.md
```

---

## Demo Videos

Two screen recordings are included in the submission to demonstrate functionality:
- This video demonstrates the site from a customer's perspective (account creation, browsing, basket, checkout).

https://github.com/user-attachments/assets/688fbac9-62fa-4ff3-b49c-33277067ba47

- This video demonstrates how the admin can manage books via the admin dashboard.

https://github.com/user-attachments/assets/fe26477e-f4b9-47fb-a742-eaa25344661c

## Notes on Implementation

- A total of ten books are stored in the MySQL `books` table with appropriate fields, such as ISBN-13, title, author, description, prices, and quantity.
- All forms and book data are processed through PHP and stored in the database.
- Client-side validation is present for interactive elements, and server-side validation is handled in PHP.
- The admin dashboard is only accessible to authenticated users with admin privileges.
- The site uses session handling to track login status and user type.
- Cart functionality is handled via JavaScript with POST requests to PHP scripts for data persistence.

---

## Known Issues / Constraints

- PHPMyAdmin was not available on Codio. Development and database testing were conducted locally using XAMPP.
- MySQL development on Codio was very difficult to set up. I faced many obstacles to establish a connection to a MySQL database, so I decided to switch development tools from Codio to XAMPP and VS Code.
- Minor responsiveness limitations due to time constraints.
- Due to deadline pressure and workload from other modules, some components (like HTML structure and form layout) were assisted using AI and later modified.

Due to persistent technical issues with MySQL configuration on Codio (including repeated failures to connect via the expected PHP sockets and an inaccessible PHPMyAdmin interface), I completed full development and testing in a local XAMPP environment.

I ensured all files were ported into Codio, but MySQL database connection failures (Error 2002: No such file or directory) made it impractical to demonstrate functionality there.

The project has been fully tested locally and is demonstrated through video walkthroughs of both customer and admin features.

## Database Connection Issue

The following error persisted despite many attempts at configuration:
``` 
Connection failed: SQLSTATE[HY000] [2002] No such file or directory
```
---

## Final Comments

This project has been developed under significant time constraints, including multiple overlapping deadlines. Despite this, the final product satisfies all core requirements and has been thoroughly tested locally. Video walkthroughs are included to demonstrate the functionality in full.

---
