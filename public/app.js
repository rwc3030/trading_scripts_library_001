document.addEventListener('DOMContentLoaded', function() {
    fetchSnippets();

    function fetchSnippets() {
        fetch('api/getData.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                displaySnippets(data);
            })
            .catch(error => {
                console.error('Error fetching snippets:', error);
                const snippetsContainer = document.getElementById('snippets');
                snippetsContainer.innerHTML = '<p>Error loading snippets. Please try again later.</p>';
            });
    }

    function displaySnippets(snippets) {
        const snippetsContainer = document.getElementById('snippets');
        snippetsContainer.innerHTML = '';

        snippets.forEach(snippet => {
            const snippetElement = document.createElement('div');
            snippetElement.classList.add('snippet');
            snippetElement.innerHTML = `
                <h2>${snippet.title}</h2>
                <pre>${snippet.code}</pre>
                <p>Category: ${snippet.category}</p>
            `;
            snippetsContainer.appendChild(snippetElement);
        });
    }

    const loginForm = document.getElementById('form-login');
    loginForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        fetch('api/login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email, password })
        })
        .then(response => response.json())
        .then(data => {
            const loginMessage = document.getElementById('login-message');
            if (data.success) {
                loginMessage.textContent = 'Login successful!';
                // Redirect or update UI as needed
            } else {
                loginMessage.textContent = 'Login failed: ' + data.message;
            }
        })
        .catch(error => console.error('Error during login:', error));
    });
});
