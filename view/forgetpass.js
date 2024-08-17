function validateForm() {
  const forgetPassMsg = document.getElementById('forgetpass');
  const email = document.getElementById('email').value;
  const emailRegex = /^\S+@\S+\.\S+$/;

  if (!email) {
    document.getElementById("forgetpass").innerHTML = "Please fill email.";
    document.getElementById("forgetpass").style.display = "block";
    return false;
  }

  if (!emailRegex.test(email)) {
    // forgetPassMsg.textContent = 'Please enter a valid email address.';
    document.getElementById("forgetpass").innerHTML = "Please enter a valid email address.";
    document.getElementById("forgetpass").style.display = "block";
    return false;
  }

  return true;
}
