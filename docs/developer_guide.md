# Developer Onboarding Guide

## Introduction
Welcome to the Pinescript Code Viewer project! This guide is designed to help new developers onboard quickly and effectively. It covers the project architecture, features, setup instructions, and coding standards.

## Project Architecture
The Pinescript Code Viewer is structured into several key directories:

- **public/**: Contains the front-end files including HTML, CSS, and JavaScript.
- **src/**: Contains the back-end PHP files, including API endpoints and database interactions.
- **config/**: Holds configuration files for database settings.
- **pinescript/**: Contains JSON files for storing Pinescript code snippets.
- **docs/**: Documentation files including this onboarding guide.

## Features
The application provides the following features:

1. **User Registration and Authentication**: Users can create accounts, log in, and manage their favorite snippets.
2. **Code Snippet Display**: Users can view and copy TradingView Pinescript snippets in a user-friendly format.
3. **API Endpoints**: The application exposes API endpoints for retrieving code snippets programmatically.
4. **Database Integration**: The application connects to a MySQL database to store user data and snippets.

## Setup Instructions
To set up the project locally, follow these steps:

1. **Clone the Repository**:
   ```bash
   git clone <repository-url>
   cd <repository-name>
   ```

2. **Set Up the Environment**:
   - Ensure you have a LAMP server running (Apache, PHP, MySQL).
   - Create a `.env` file in the project root and configure your database credentials.

3. **Create the Database**:
   - Run the SQL script located in `setup_database.sql` to create the necessary database and tables.

4. **Install Dependencies**:
   - If using Composer for PHP dependencies, run:
     ```bash
     composer install
     ```

5. **Run the Application**:
   - Start your local server and navigate to `http://localhost/<project-root>/public/index.php`.

## Coding Standards
To maintain code quality and consistency, adhere to the following coding standards:

- **PHP**:
  - Use PSR-12 coding style.
  - Function names should be in snake_case.
  - Use meaningful variable names and add comments for complex logic.

- **JavaScript**:
  - Use camelCase for variable and function names.
  - Keep functions under 20 lines; split complex functions as needed.
  - Use ES6+ syntax where applicable.

- **General**:
  - Follow the DRY (Don't Repeat Yourself) principle.
  - Write unit tests for critical functionality.
  - Ensure error handling is implemented with clear messages.

## Conclusion
This guide provides a comprehensive overview to help you get started with the Pinescript Code Viewer project. For any questions or further assistance, please refer to the documentation or reach out to the team.

Happy coding!
