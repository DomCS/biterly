
function validateForm() {
  var username = document.getElementById("usernameInput").value;
  var password = document.getElementById("passwordInput").value;
  if (username == "" || username.length < 3) {
    alert("Name is not at least 3 characters");
    return false;
  }
  if (password == "" || password.length < 6) {
    alert("password is not at least 6");
    return false;
  }
  document.getElementById("usernameInput").value.innerHTML="";
}


function myFunction() {
  var x, text;
  // Get the value of the input field with id="numb"
  x = document.getElementById("bidsInput").value;
  // If x is Not a Number or less than one or greater than 10
  if (isNaN(x) || x < 1 || x > 10) {
    text = "Input not valid";
  } else {
    text = "Input OK";
  }
  document.getElementById("demo").innerHTML = text;
}
