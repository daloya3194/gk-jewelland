const d_none = "d-none";

const nav_button = document.querySelector("#nav_button");
const navi = document.querySelector("#navi");

if (nav_button !== null && navi !== 0) {
    nav_button.addEventListener("click", () => {
        navi.classList.toggle(d_none);
    });

    document.addEventListener('click', function(event) {
        const isClickInsideElement = nav_button.contains(event.target);
        if (!isClickInsideElement) {
            navi.classList.add(d_none);
        }
    });
}

/*$(document).ready(function() {
    $('#example').DataTable({
        responsive: true,
    });
} );*/

function deleteImage(image_id, app_url, fallback_url, csrf_token) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            window.location.href = fallback_url;
        }
    }
    xhr.open("POST", app_url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
    xhr.send(JSON.stringify({
        image_id: image_id,
    }));
}

function showElement(element_id) {
    document.getElementById(element_id).classList.remove('hidden');
}

function hideElement(element_id) {
    document.getElementById(element_id).classList.add('hidden');
}

function hideElementByParentClick(element_id) {
    document.getElementById(element_id).addEventListener('click', e => {
        if(e.target === e.currentTarget) {
            document.getElementById(element_id).classList.add('hidden');
        }
    });
}
