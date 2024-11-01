document.getElementById('bookmarkForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    const title = document.getElementById('title').value;
    const url = document.getElementById('url').value;
    const description = document.getElementById('description').value;

    await fetch('api.php?action=create', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `title=${encodeURIComponent(title)}&url=${encodeURIComponent(url)}&description=${encodeURIComponent(description)}`
    });

    loadBookmarks();
    e.target.reset();
});

async function loadBookmarks() {
    const response = await fetch('api.php?action=read');
    const bookmarks = await response.json();
    const list = document.getElementById('bookmarkList');
    list.innerHTML = '';
    bookmarks.forEach(b => {
        const item = document.createElement('li');
        item.textContent = `${b.title} - ${b.url} - ${b.description}`;
        list.appendChild(item);
    });
}

loadBookmarks();
