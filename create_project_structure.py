import os

# Define the directory structure
directory_structure = {
    "project-root": {
        "public": [
            "index.php",
            "app.js",
            "styles.css"
        ],
        "src": {
            "database.php": None,
            "api": [
                "getData.php"
            ],
            "partials": [
                "header.php"
            ],
            "utils": [
                "websocket-server.php"
            ]
        },
        "config": [
            "config.php"
        ],
        "pinescript": [
            "snippets.json"
        ],
        "README.md": None
    }
}

def create_structure(base_path, structure):
    """Create the directory structure based on the provided structure."""
    for name, content in structure.items():
        path = os.path.join(base_path, name)
        if isinstance(content, list):
            create_files(path, content)
        elif isinstance(content, dict):
            os.makedirs(path, exist_ok=True)
            create_structure(path, content)
        else:
            open(path, 'a').close()  # Create empty file

def create_files(path, files):
    """Create empty files in the specified path."""
    os.makedirs(path, exist_ok=True)
    for file_name in files:
        open(os.path.join(path, file_name), 'a').close()  # Create empty files

# Create the project structure
create_structure('.', directory_structure)
