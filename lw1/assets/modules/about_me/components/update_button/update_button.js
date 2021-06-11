import './update_button.css';

function bindButton(btnId, keyword) {
    const button = document.getElementById(btnId)

    button.addEventListener("click", getUpdate)
}

async function getUpdate() {
    const response = await fetch('./updateOne?' + new URLSearchParams({
        newKeyword: keyword,
    }))
}

export {bindButton}