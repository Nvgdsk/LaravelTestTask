<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Lucky Game</h2>
    <div class="d-grid gap-3 col-6 mx-auto">
        <button id="generateLinkBtn" class="btn btn-success">Generate New AccessLink</button>
        <button id="deactivateLinkBtn" class="btn btn-danger">Deactivate Current Link</button>
        <button id="luckyBtn" class="btn btn-warning">I'm Feeling Lucky</button>
        <button id="historyBtn" class="btn btn-info">History</button>
    </div>
    <div id="historyResults" class="mt-4"></div>
</div>
</body>
<script>
const urlParts = window.location.pathname.split('/');
const token = urlParts[urlParts.length - 1];

function getHeaders(method = 'GET') {
    return {
        'X-Access-Token': token,
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    };
}

document.getElementById('generateLinkBtn').onclick = async function() {
    const response = await fetch('/access-link/generate', {
        method: 'POST',
        headers: getHeaders('POST')
    });
    const data = await response.json();
    const link = data.data?.access_link;
    if (link) {
        const historyDiv = document.getElementById('historyResults');
        historyDiv.innerHTML = `<h4>New Access Link</h4><a href="${link}" target="_blank">${link}</a>`;
    } else {
        alert('Error generating access link');
    }
};

document.getElementById('deactivateLinkBtn').onclick = async function() {
    const response = await fetch('/access-link/remove', {
        method: 'DELETE',
        headers: getHeaders('DELETE')
    });
    const data = await response.json();
    alert(data.deleted ? 'Link deactivated!' : 'Failed to deactivate link.');
    if (data.deleted) {
        window.location.href = '/register';
    }
};

document.getElementById('luckyBtn').onclick = async function() {
    const response = await fetch('/luckygame/start', {
        method: 'POST',
        headers: getHeaders('POST')
    });
    const data = await response.json();
    const historyDiv = document.getElementById('historyResults');
    if (data.data) {
        historyDiv.innerHTML = '<h4>Latest Result</h4>' +
            `<ul class="list-group"><li class="list-group-item">Result: ${data.data.result ?? '-'}, Win Amount: ${data.data.win_amount ? (data.data.win_amount / 100).toFixed(2) : 0.00}$ </li></ul>`;
    } else {
        historyDiv.innerHTML = '<h4>Latest Result</h4><p>No result found.</p>';
    }
};

document.getElementById('historyBtn').onclick = async function() {
    const response = await fetch('/luckygame/history', {
        method: 'GET',
        headers: getHeaders('GET')
    });
    const data = await response.json();
    const historyDiv = document.getElementById('historyResults');
    if (Array.isArray(data.data) && data.data.length > 0) {
        historyDiv.innerHTML = '<h4>History</h4>' +
            '<ul class="list-group">' +
            data.data.map(item => `<li class="list-group-item">Result: ${item.result ?? '-'}, Win Amount: ${item.win_amount ? (item.win_amount / 100).toFixed(2) : 0.00}$</li>`).join('') +
            '</ul>';
    } else {
        historyDiv.innerHTML = '<h4>History</h4><p>No history found.</p>';
    }
};
</script>
</html>