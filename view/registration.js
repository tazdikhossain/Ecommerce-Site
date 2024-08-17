function registrationForm() {
  var firstName = document.getElementById("first_name").value;
  var lastName = document.getElementById("last_name").value;
  var gender = document.getElementsByName("gender");
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var dob = document.getElementById("dob").value;
  var address = document.getElementById("address").value;
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  var error = "";

if (firstName == "" || lastName == "" || gender =="" || email == "" || phone == "" || dob == "" || address == "" || username == "" || password == "") {
    error = "\nPlease fill up all the information.\n";
    document.getElementById("Registration").classList.add("error");
    document.getElementById("Registration").style.display = "block";
  } else {
    document.getElementById("Registration").classList.remove("error");
  }


  if (error != "") {
    document.getElementById("Registration").innerHTML = error;
    return false;
  } else {
    return true;
  }
}


function myFunction(showpassword) {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
