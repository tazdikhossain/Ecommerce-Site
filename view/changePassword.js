
function changePassword() {
  var currentPassword = document.getElementById("currentPassword").value;
  var newPassword = document.getElementById("new_password").value;
  var confirmPassword = document.getElementById("confirm_password").value;

  var error = "";

if (currentPassword == "" || newPassword == "" || confirmPassword =="") {
    error = "\nPlease fill up all the information.\n";
    document.getElementById("Pass").classList.add("error");
    document.getElementById("Pass").style.display = "block";
  } 
  else if(newPassword != confirmPassword){
    error = "\nNew password and confirm password are not same.\n";
    document.getElementById("Pass").classList.add("error");
    document.getElementById("Pass").style.display = "block";
  }

  else {
    document.getElementById("Pass").classList.remove("error");
    alert("Password change successfully!");
  }




  if (error != "") {
    document.getElementById("Pass").innerHTML = error;
    return false;
  } else {
    return true;
  }
}