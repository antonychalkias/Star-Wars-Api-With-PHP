document.addEventListener("DOMContentLoaded", function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById("nav-placeholder").innerHTML = xhr.responseText;
            } else {
                console.error("Failed to load navbar.html");
            }
        }
    };
    xhr.open("GET", "./UI/navbar.html", true);
    xhr.send();
});
