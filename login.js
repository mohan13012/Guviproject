function validate() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username == "" || password == "") {
        alert("Please enter both username and password.");
        return false;
    }
    else if (username == "admin" && password == "password") {
        alert("Login successful!");
        return true;
    }
    else {
        alert("Invalid username or password.");
        return false;
    }
}