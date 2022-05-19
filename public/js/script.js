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

function setAddress(address_id) {
    const firstname = document.getElementById('firstname');
    const lastname = document.getElementById('lastname');
    const street = document.getElementById('street');
    const house_number = document.getElementById('house_number');
    const zip_code = document.getElementById('zip_code');
    const city = document.getElementById('city');
    const country = document.getElementById('country');

    if (parseInt(address_id) === 0) {
        firstname.value = null;
        lastname.value = null;
        street.value = null;
        house_number.value = null;
        zip_code.value = null;
        city.value = null;
        country.value = null;
    } else {
        const select_address = document.getElementById('select_address' + address_id);
        const complete_address = JSON.parse(select_address.getAttribute('data-address'));
        firstname.value = complete_address['firstname'];
        lastname.value = complete_address['lastname'];
        street.value = complete_address['street'];
        house_number.value = complete_address['house_number'];
        zip_code.value = complete_address['zip_code'];
        city.value = complete_address['city'];
        country.value = complete_address['country'];
    }
}
