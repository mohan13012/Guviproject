function createUserProfile() {
    // Retrieve input values
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    
    // Create user profile object
    var userProfile = {
        firstName: firstName,
        lastName: lastName,
        email: email,
        password: password
    };
    
    // Display user profile object in console
    console.log(userProfile);
}