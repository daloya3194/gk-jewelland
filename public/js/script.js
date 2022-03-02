const d_none = "d-none";

const nav_button = document.querySelector("#nav_button");
const navi = document.querySelector("#navi");

nav_button.addEventListener("click", () => {
    navi.classList.toggle(d_none);
});

document.addEventListener('click', function(event) {
    const isClickInsideElement = nav_button.contains(event.target);
    if (!isClickInsideElement) {
        navi.classList.add(d_none);
    }
});

$(document).ready(function() {
    $('#example').DataTable({
        responsive: true,
    });
} );
