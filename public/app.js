function fetchSnippets() {
    fetch('api/getData.php')
        .then(handleResponse)
        .then(handleData)
        .catch(handleError);
}

function handleResponse(response) {
    if (!response.ok) {
        logError('Network response was not ok');
        throw new Error('Network response was not ok');
    }
    return response.json();
}

function handleData(data) {
    if (data.status === 'error') {
        logError('Error fetching data: ' + data.message);
        return;
    }
    displaySnippets(data.snippets);
}

function displaySnippets(snippets) {
    const snippetsContainer = document.getElementById('snippets');
    snippetsContainer.innerHTML = '';

    snippets.forEach(snippet => {
        const snippetElement = createSnippetElement(snippet);
        snippetsContainer.appendChild(snippetElement);
    });
}

function createSnippetElement(snippet) {
    const snippetElement = document.createElement('div');
    snippetElement.classList.add('snippet');
    snippetElement.innerHTML = `
        <h2>${snippet.title}</h2>
        <pre>${snippet.code}</pre>
    `;
    return snippetElement;
}

function handleError(error) {
    logError('Fetch error: ' + error);
}

function logError(message) {
    console.error(message);
    // Optionally send error to a logging service
}

// Handle login form submission
document.getElementById('form-login').addEventListener('submit', function(event) {
    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Perform login logic here (e.g., send to server)
    // For now, just log the values
    console.log('Login attempted with:', email, password);
});

// Initialize fetching of snippets
fetchSnippets();
