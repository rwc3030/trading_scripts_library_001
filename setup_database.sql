-- Create the database
CREATE DATABASE IF NOT EXISTS trading_scripts_library_001
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE trading_scripts_library_001;

-- Create users table
CREATE TABLE IF NOT EXISTS trading_scripts_library_001_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Create snippets table
CREATE TABLE IF NOT EXISTS trading_scripts_library_001_snippets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES trading_scripts_library_001_users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Create categories table
CREATE TABLE IF NOT EXISTS trading_scripts_library_001_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Insert initial data into categories
INSERT INTO trading_scripts_library_001_categories (name) VALUES
('Technical Analysis'),
('Indicators'),
('Strategies'),
('Scripts');

-- Insert initial data into users
INSERT INTO trading_scripts_library_001_users (email, password) VALUES
('user@example.com', 'hashed_password');

-- Insert initial data into snippets
INSERT INTO trading_scripts_library_001_snippets (title, code, category, user_id) VALUES
('Simple Moving Average', '//@version=4\nstudy("SMA", overlay=true)\nplot(sma(close, 14))', 'Technical Analysis', 1),
('RSI Indicator', '//@version=4\nstudy("RSI", overlay=false)\nrsi(close, 14)', 'Indicators', 1);
