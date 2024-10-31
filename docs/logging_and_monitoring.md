# Logging and Monitoring

## PHP Error Logging
- PHP errors are logged to `logs/php_errors.log`.
- Ensure that the log file is writable by the web server.

## Database Query Logging
- Database query errors are logged in the same PHP error log.
- Check the log for any database connection or query issues.

## JavaScript Error Logging
- JavaScript errors and AJAX call failures are logged to the console.
- You can enhance this by sending logs to a remote logging service.

## Accessing Logs
- PHP logs can be accessed at `logs/php_errors.log`.
- Monitor this file regularly for any issues.

## Monitoring Tools
- Consider using monitoring tools like New Relic or Sentry for application performance and error tracking.
- Ensure that sensitive information is not logged.
