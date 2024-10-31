document.addEventListener('DOMContentLoaded', function() {
    fetchSnippets();

    function fetchSnippets() {
        fetch('api/getData.php')
            .then(response => response.json())
            .then(data => {
                displaySnippets(data);
            })
            .catch(error => console.error('Error fetching snippets:', error));
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
});
