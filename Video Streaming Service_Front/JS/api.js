// Login form submit event
document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault();

    var username = document.getElementById("loginUsername").value;
    var password = document.getElementById("loginPassword").value;

    // Send a POST request to the API
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Handle the response from the API
            } else {
                console.error("Error: " + xhr.status);
            }
        }
    };
    xhr.send("login=true&username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password));
});

// Register form submit event
document.getElementById("registerForm").addEventListener("submit", function (event) {
    event.preventDefault();

    var username = document.getElementById("registerUsername").value;
    var email = document.getElementById("registerEmail").value;
    var password = document.getElementById("registerPassword").value;

    // Send a POST request to the API
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Handle the response from the API
            } else {
                console.error("Error: " + xhr.status);
            }
        }
    };
    xhr.send("register=true&username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password));
});

// Forgot password form submit event
document.getElementById("forgotPasswordForm").addEventListener("submit", function (event) {
    event.preventDefault();

    var email = document.getElementById("forgotEmail").value;

    // Send a POST request to the API
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Handle the response from the API
            } else {
                console.error("Error: " + xhr.status);
            }
        }
    };
    xhr.send("forgot=true&email=" + encodeURIComponent(email));
});
