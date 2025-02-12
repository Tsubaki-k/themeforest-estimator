# 🌟 ThemeForest Pure Earning Calculator

![PHP Version](https://img.shields.io/badge/PHP-8.3-blue.svg)  
![Laravel Version](https://img.shields.io/badge/Laravel-11-red.svg)  
![Vue.js](https://img.shields.io/badge/Vue-3-42b883.svg)  
![Inertia.js](https://img.shields.io/badge/Inertia.js-enabled-purple.svg)  
![License](https://img.shields.io/badge/License-MIT-green.svg)  

[//]: # (![Tests]&#40;https://img.shields.io/badge/Tests-Passing-brightgreen.svg&#41;)

A powerful tool for calculating **pure earnings** on ThemeForest. Since Envato's earning fees decrease as sales increase, this tool accurately calculates net earnings by considering sales count, item price, and creation time. It also supports currency conversion for multi-currency revenue calculations.

## 🚀 Features
- **Accurate Earning Calculation** – Computes **pure earnings** based on ThemeForest's dynamic fee structure.
- **Sales-Based Fee Adjustment** – Considers total sales to determine the correct fee percentage.
- **Multi-Currency Support** – Converts earnings into a second currency.
- **Modern Tech Stack** – Built with **Laravel 11**, **Vue 3**, and **Inertia.js** for efficiency.
- **PHP 8.3 Support** – Utilizes the latest PHP features for speed and security.
- **MIT Licensed** – Open-source and free to use!

## 🛠️ Tech Stack
- **Backend:** Laravel 11, PHP 8.3
- **Frontend:** Vue 3, Inertia.js


## 📦 Installation
### 1️⃣ Clone the Repository
```sh
git clone https://github.com/Tsubaki-k/themeforest-estimator.git
```

## 2️⃣ Set Up Environment Variables
* **For main environment** Copy `.env.example` to `.env` and configure your database settings
* **For test environment** copy `env.example` to `env.testing` and configure your testing database settings

## 3️⃣ Install Dependencies & generate key
``` sh
composer install
```

``` sh
npm install
```

``` sh
php artisan key:generate
```

## 4️⃣ Run Migrations
```sh
php artisan migrate 
```

## 5️⃣ Start the Development Server
```sh
- php artisan serve
- npm run dev
```
