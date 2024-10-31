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

// Initialize fetching of snippets
fetchSnippets();
