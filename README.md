# gLedger - Daily Goods Purchase Ledger

A PHP-based web application for tracking daily household or shared living expenses among multiple members.

## Features

- User authentication with secure password hashing
- Dashboard overview of expenses
- Ledger management for tracking purchases
- Expense entry and management
- Data export capabilities
- Responsive Bootstrap UI

## Requirements

- PHP 7.4 or higher (8.x recommended)
- MySQL 5.7+ or MariaDB 10.2+
- Web server (Apache, Nginx) or XAMPP/WAMP/MAMP
- PHP PDO extension enabled

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/arman-arif/gledger.git
cd gledger
```

### 2. Database Setup

1. Create a MySQL database named `gledger`:
```sql
CREATE DATABASE gledger;
```

2. Import the database schema and sample data:
```bash
mysql -u root -p gledger < gledger.sql
```

### 3. Configure Environment Variables

1. Copy the example environment file:
```bash
cp .env .env.local
```

2. Edit `.env.local` (or `.env`) with your database credentials:
```env
DB_HOST=localhost
DB_NAME=gledger
DB_USER=your_username
DB_PASS=your_password
```

**Important:** The `.env` file is not committed to version control by default. Create it from the template provided.

### 4. Web Server Configuration

#### Using Apache/Nginx:
- Place the project files in your web server's document root
- Ensure the web server has read/write permissions to the project directory
- Enable URL rewriting if needed

#### Using XAMPP/WAMP/MAMP:
- Copy the `gledger` folder to your `htdocs` (XAMPP) or `www` (WAMP) directory
- Start Apache and MySQL services

### 5. Access the Application

Open your browser and navigate to:
```
http://localhost/gledger
```

### Default Login Credentials

After importing the sample data, you can log in with:
- **Username:** admin
- **Password:** password

**⚠️ Security Note:** Change the default password immediately after first login!

## Project Structure

```
gledger/
├── conf/               # Configuration files
│   ├── db.config.php   # Database configuration (loads from .env)
│   └── env.loader.php  # Environment variable loader
├── libraries/          # Core library classes
│   ├── Database.php    # Database connection handler
│   ├── Session.php     # Session management
│   └── Tools.php       # Utility functions
├── modules/            # Application modules
│   ├── Dashboard.php
│   ├── Expenses.php
│   ├── Ledger.php
│   ├── Login.php
│   └── Users.php
├── pages/              # View templates
├── assets/             # CSS, JS, and vendor files
├── resources/          # Images and other resources
├── .env                # Environment configuration (create from template)
└── gledger.sql         # Database schema and sample data
```

## Security Features

- Prepared statements to prevent SQL injection
- Secure password hashing using PHP's `password_hash()` and `password_verify()`
- Session-based authentication
- Input validation and sanitization
- Environment-based configuration (no hardcoded credentials)

## Troubleshooting

### Database Connection Issues
- Verify your `.env` file contains correct database credentials
- Ensure MySQL/MariaDB service is running
- Check that the database exists and user has proper permissions

### Permission Errors
- Ensure the web server has read access to all project files
- Check PHP error logs for detailed error messages

### Blank Page
- Enable error reporting in `conf/db.config.php` temporarily for debugging
- Check web server error logs

## License

MIT License - see LICENSE file for details

## Contributing

Contributions are welcome! Please feel free to submit pull requests or open issues for bugs and feature requests.
