function validateForm() {
    
    var name = document.forms["registrationForm"]["name"].value;
    var email = document.forms["registrationForm"]["email"].value;
    var password = document.forms["registrationForm"]["password"].value;
  
  
    if (name == "") {
      alert("Name must be filled out");
      return false;
    }
  
  
    if (email == "") {
      alert("Email must be filled out");
      return false;
    }
  
   
    if (password == "") {
      alert("Password must be filled out");
      return false;
    }
  
    if (password.length < 8) {
      alert("Password must be at least 8 characters long");
      return false;
    }
  }

  function submitForm() {
    
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
  
   
    $.ajax({
      type: "POST",
      url: "Register.php",
      data: { name: name, email: email, password: password },
      success: function(response) {
     
        alert(response);
      },
      error: function() {
        alert("An error occurred while submitting the form.");
      }
    });

localStorage.setItem('token', response.token);
  }