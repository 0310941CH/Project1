var password = document.getElementById("password");


// When the user clicks on the password field, show the message box

password.onfocus = function() {
    document.getElementById("mustHave").style.display = "block";
  }
  
  // When the user clicks outside of the password field, hide the message box
  password.onblur = function() {
    document.getElementById("mustHave").style.display = "none";
  }
  