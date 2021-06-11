import './update_button.css';

function bindButton(buttonId, keyword, updateUrl) {
    const button = document.getElementById(buttonId);
    button.addEventListener("click", function (event) {
        getUpdate(button, keyword, updateUrl);
    });
    console.log(keyword, button.getAttribute('href'));
}

async function getUpdate(button, keyword, updateUrl) {
    let data = {
        'keyword': keyword,
    }

    await fetch(updateUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data),
    })
}

export {bindButton, getUpdate};