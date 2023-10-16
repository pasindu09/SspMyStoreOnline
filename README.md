<div align="center">
  <img src="https://github.com/pasindu09/Sspmystoreonline/assets/107637958/cf13edf5-a169-471f-88f9-2d77e14e1fc4" alt="Sspmystoreonline" height="200" width="200">
</div>

## Table of Contents

- [About MyStoreOnline](#about-MyStoreOnline)
- [Screenshots](#screenshots)
- [Technologies Used](#technologies-used)
- [User Features](#user-features)
- [Admin Features](#admin-features)
- [Getting Started](#getting-started)
  - [Prerequirements](#prerequirements)
  - [Installation](#installation)
- [Usage](#usage)
- [License](#license)
- [Credits](#credits)
- [Contact](#contact)
- [Acknowledgements](#acknowledgements)

## About MyStoreOnline

Welcome to the development journey of the CRM system for MyStoreOnline, an e-commerce platform designed to streamline and enhance customer relationships. This innovative CRM system is poised to revolutionize the way MyStoreOnline manages its products and interacts with its valued customers. The system will feature several essential modules, each tailored to address specific aspects of the e-commerce platform.

## Project Document
[Project Document.pdf](https://github.com/pasindu09/Sspmystoreonline/files/12918344/SSP.2.FINAL.pdf)



## Screenshots

### Home Page(1)

<div align="center">
  <img src="https://github.com/pasindu09/Sspmystoreonline/assets/107637958/446afb65-d793-432e-be07-e10c49e3c6ce"
        alt="MyStoreOnlinehome"
        width="600">
 
</div>

### Home Page(2)
<div align="center">
 <img src="https://github.com/pasindu09/Sspmystoreonline/assets/107637958/7d531860-0063-4268-a5d3-e4459e680d0f"
        alt="MyStoreOnlinehome"
        width="600">
</div>

### Home Page(3)
<div align="center">
 <img src="https://github.com/pasindu09/Sspmystoreonline/assets/107637958/f16eb205-418f-4b8e-94b7-debbb74cfc63"
        alt="MyStoreOnlinehome"
        width="600">
</div>

### CRM
<div align="center">
 <img src="https://github.com/pasindu09/Sspmystoreonline/assets/107637958/18761dd2-d938-4921-be64-9f940f9dafde"
        alt="MyStoreOnlinehome"
        width="600">
</div>


## Technologies Used

- **Frontend** - HTML, CSS, JavaScript(Alpine), Tailwind CSS, AJAX
- **Backend** - PHP, Laravel, Livewire, MySQL
- **Development Tools** - Git, GitHub, VS Code, Composer, NPM, Laravel Mix


## User Features
- **User Authentication** - Users have the ability to create an account, log in, and reset their password if needed.
- **Product Catalog** - Users can explore the catalog, accessing detailed information about each product.
- **Shopping Cart** - Users can add items to their cart for later purchase and proceed to checkout.
- **Checkout** - Users can complete their purchase by providing necessary information and making payment.
- **Order History** - Users can review their past orders along with specific details for each one.
- **Address Book** - Users can manage their addresses, including adding, editing, and deleting entries.
- **Profile** - Users have the option to update their profile details and change their password.

## Admin Features
- **Admin Authentication** - Admins can log in securely to access the admin dashboard.
- **Admin Dashboard** - Admins have a centralized view, including user and seller lists, with the ability to manage users.
- **User Management** - Admins can oversee user details and make necessary updates.
- **User Metrics** - Sellers have access to insightful user statistics.

## Seller Features
- **Analytics** - Sellers can gain insights into various aspects of their shop's performance.
- **Revenue Metrics** - Sellers can monitor revenue-related metrics for their store.
- **Product Metrics** - Sellers can track metrics related to their products' performance.
- **Product Management** - Admins can view and modify product information.
- **Profile** - Sellers have the option to update their profile information and modify their password.


## Getting Started

### Prerequisites

- PHP 7.4 or higher
- Composer
- Node.js
- NPM
- MySQL


### Installation

1. Clone the repository
```bash
git clone https://github.com/pasindu09/Sspmystoreonline.git
```

2. Install dependencies
```bash
composer install
npm install
```

3. Create a database and import the database dump file
```bash
mysql -u username -p mo < database_dump.sql
```

4. Create a `.env` file and add the following environment variables
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mo
DB_USERNAME=root
DB_PASSWORD=
```


## Usage

1. Run the development server
```bash
php artisan serve
```

2. Run the development build
```bash
npm run dev
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contact

- [Pasindu Pinidiya](mailto:pasindupinidiya1@gmail.com)

