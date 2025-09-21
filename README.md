# Online Clothing Store

An E-Commerce website for selling clothing items with a complete user interface and admin management system.

This is a tutorial project developed for the Web Programming I subject at Java Institute for Advanced Technology (JIAT).

## Features

### User-Side Features

#### Authentication & User Management

- **User Registration**: New users can create accounts with first name, last name, email, mobile, username, and password
- **User Sign In**: Existing users can log in with username and password
- **Remember Me**: Option to save login credentials using cookies
- **User Profile Management**: Users can update their profile information including:
  - Personal details (name, email, mobile, password)
  - Profile image upload
  - Shipping address (number, street, city)
- **User Sign Out**: Secure logout functionality

#### Product Browsing & Search

- **Product Catalog**: Browse all available clothing items with pagination
- **Basic Search**: Search products by name with real-time results
- **Advanced Filtering**: Filter products by:
  - Color
  - Category
  - Brand
  - Size
  - Price range (minimum and maximum)
- **Product Details**: View detailed information for each product including:
  - Product name and description
  - Brand, category, color, and size
  - Product images
  - Price and available quantity
  - Stock status

#### Shopping Cart & Checkout

- **Add to Cart**: Add products to shopping cart with quantity selection
- **Cart Management**:
  - View all cart items
  - Update quantities (increment/decrement)
  - Remove items from cart
  - Real-time cart updates
- **Quantity Validation**: Stock availability checking before adding to cart
- **Cart Persistence**: Cart items saved per user session

#### Navigation & UI

- **Responsive Navigation Bar**: Fixed navigation with links to:
  - Home page
  - User profile
  - Shopping cart
  - Purchase history (placeholder)
  - Sign out
- **Dark Theme**: Modern dark theme design throughout the application
- **Mobile-Responsive Design**: Bootstrap-based responsive layout

### Admin-Side Features

#### Admin Authentication & Access Control

- **Admin Sign In**: Secure admin login system with username and password
- **Session Management**: Protected admin areas with session validation
- **Admin Navigation**: Dedicated admin navigation bar with access to all management areas

#### User Management

- **View All Users**: Complete user listing with details (ID, name, email, mobile, status)
- **User Status Management**: Enable/disable user accounts by changing user status
- **User Search**: Find specific users by ID for status updates
- **Real-time User Updates**: Dynamic user table updates without page reload

#### Product & Inventory Management

- **Brand Management**:
  - Register new clothing brands
  - View and manage existing brands
- **Category Management**:
  - Add new product categories
  - Organize products by category
- **Color Management**:
  - Register new color options
  - Manage available color variants
- **Size Management**:
  - Add new size options (S, M, L, XL, etc.)
  - Manage size variants for products

#### Stock Management

- **Product Registration**: Add new products with:
  - Product name and description
  - Brand, category, color, and size selection
  - Product image upload
  - Initial stock quantity and pricing
- **Stock Updates**: Modify existing product stock levels and prices
- **Inventory Tracking**: Monitor product availability and stock status

#### Reporting & Analytics

- **Stock Reports**: View detailed stock level reports for inventory management
- **Product Reports**: Analyze product performance and catalog statistics
- **User Reports**: Generate user activity and registration reports
- **Centralized Reporting Dashboard**: Access all reports from a single interface

#### Administrative Interface Features

- **Responsive Admin Design**: Dark theme admin interface optimized for management tasks
- **Real-time Feedback**: Instant success/error messages for all admin operations
- **Form Validation**: Comprehensive validation for all admin input forms
- **AJAX Operations**: Seamless admin operations without page reloads
- **Auto-hide Notifications**: Automatic dismissal of success messages after 5 seconds

## Installation

First install the dependencies

```bash
composer install
```

Then create a .env file and copy the content of .env.example to .env

```bash
cp .env.example .env
```

Add your database credentials to the .env file

Then sipn up the PHP development server

```bash
php -S 127.0.0.1:8000
```

## Phinx

### Migrations

To run the migrations, first create a database and add the credentials to the .env file

Then run the migrations

```bash
vendor/bin/phinx migrate
```

To create a new migration

```bash
vendor/bin/phinx create MyNewMigration
```

### Seeding

To seed the database

```bash
vendor/bin/phinx seed:run
```

To create a new seed

```bash
vendor/bin/phinx seed:create MyNewSeed
```
