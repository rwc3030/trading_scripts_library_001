# Project Setup
# Here are the requirements for the project setup.
---
### LAMP Server Requirements
1. **Using the following components**:
   - **Apache**: To serve PHP files.
   - **PHP**: Version 7.4+ for backend logic.
   - **MySQL**: For database storage and management.
   - **PHP MySQL Extension**: Required for MySQL-PHP interactions.
---
### Directory Structure with Specific Filenames
```
/project-root
├── /public
│   ├── index.php                  # Main entry file for the app
│   ├── app.js                     # JavaScript file for AJAX/real-time interactivity
│   └── styles.css                 # CSS file for basic styling
├── /src
│   ├── database.php               # Database connection and helper functions
│   ├── /api                       # Folder for API endpoint files
│   │   └── getData.php            # API endpoint for retrieving data
│   ├── /partials                  # Reusable PHP partials
│   │   └── header.php             # Common header partial
│   └── /utils                     # Utility PHP scripts
│       └── websocket-server.php   # WebSocket server script (optional, if real-time is required)
├── /config
│   └── config.php                 # Configuration file for database settings
├── /pinescript                    # Directory for Pinescript code snippets
│   └── snippets.json              # JSON file to store Pinescript code snippets
└── README.md                      # Documentation for setup and usage
```
---
## Development Best Practices
- **File Length:** Break files over 85 lines into smaller components.
- **Function Arguments:** Limit functions to five arguments maximum; use objects or arrays for additional data.
- **Function Size:** Keep functions under 20 lines; split complex functions as needed.
- **Code Comments:** Add comments for complex logic and functions.
- **Consistency:** Use camelCase for JavaScript, snake_case for PHP, and consistent formatting.
- **Error Handling:** Include error handling with clear, informative messages.
- **DRY Principle:** Refactor redundant code into functions.
- **Modular Design:** Structure code in self-contained modules.
- **Reusability:** Create generic, reusable functions and components.
---
## Deployment Instructions
1. **Prepare the Application:**
   - Ensure all configurations are set for the production environment.
   - Verify that the `.env` file contains production credentials and settings.
   - Double-check that sensitive files (like `.env`) are not exposed publicly.

2. **Deploy the Application:**
   - Upload the project files to the production LAMP server.
   - Set the appropriate permissions for the directories and files.

3. **Test the Application:**
   - Access the application in the production environment.
   - Verify that all features are working as expected.

4. **Post-Deployment:**
   - Monitor the application for any issues.
   - Update the documentation as necessary based on deployment experiences.
