# Deployment Runbook

## Overview
This runbook provides detailed instructions for deploying the Pinescript Code Viewer application. It includes configuration requirements and environment setup needed for the application's features and dependencies.

## Prerequisites
Before deploying the application, ensure the following prerequisites are met:

1. **LAMP Stack**: Ensure that the server has the LAMP stack installed:
   - **Apache**: Version 2.4 or higher
   - **MySQL**: Version 5.7 or higher
   - **PHP**: Version 7.4 or higher with the following extensions:
     - `mysqli`
     - `mbstring`
     - `json`
     - `curl`

2. **Composer**: Install Composer for managing PHP dependencies.

3. **Node.js and npm**: Install Node.js (version 14 or higher) and npm for managing JavaScript dependencies.

## Environment Configuration
1. **Database Configuration**:
   - Create a MySQL database using the provided `setup_database.sql` script.
   - Update the `config/config.php` file with the following database credentials:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'your_db_user');
     define('DB_PASS', 'your_db_password');
     define('DB_NAME', 'trading_scripts_library_001');
     ```

2. **Environment Variables**:
   - Create a `.env` file in the project root with the following variables:
     ```
     DB_HOST=localhost
     DB_USER=your_db_user
     DB_PASS=your_db_password
     DB_NAME=trading_scripts_library_001
     ```

## Application Setup
1. **Clone the Repository**:
   - Clone the repository to your server:
     ```bash
     git clone https://your-repo-url.git
     cd your-repo-directory
     ```

2. **Install PHP Dependencies**:
   - Navigate to the project directory and run:
     ```bash
     composer install
     ```

3. **Install JavaScript Dependencies**:
   - Run the following command to install JavaScript dependencies:
     ```bash
     npm install
     ```

4. **Set Permissions**:
   - Ensure that the `public` directory and its contents are accessible by the web server:
     ```bash
     sudo chown -R www-data:www-data public
     sudo chmod -R 755 public
     ```

## Deployment Steps
1. **Upload Files**:
   - Upload the project files to the production server using SFTP or any other method.

2. **Configure Apache**:
   - Create a new Apache configuration file for the application:
     ```apache
     <VirtualHost *:80>
         ServerName yourdomain.com
         DocumentRoot /path/to/your/project/public

         <Directory /path/to/your/project/public>
             AllowOverride All
             Require all granted
         </Directory>

         ErrorLog ${APACHE_LOG_DIR}/error.log
         CustomLog ${APACHE_LOG_DIR}/access.log combined
     </VirtualHost>
     ```
   - Enable the new site and restart Apache:
     ```bash
     sudo a2ensite your-site.conf
     sudo systemctl restart apache2
     ```

3. **Test the Application**:
   - Access the application in a web browser at `http://yourdomain.com`.
   - Verify that all features are working as expected.

## Post-Deployment
- Monitor the application for any issues.
- Update the documentation as necessary based on deployment experiences.
