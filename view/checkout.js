// function validateForm(){
// 	const full_name = document.getElementById('full_name').value;
//  	const email = document.getElementById('email_address').value;
//  	const phone_number = document.getElementById('phone_number').value;
//  	const address = document.getElementById('address').value;

//  	if (full_name == "" || email == "" || phone_number =="" || address == "") {
//     error = "\nPlease fill up all the information.\n";
//     document.getElementById("checkout").classList.add("error");
//     document.getElementById("checkout").style.display = "block";
//   }
// }


function validateForm() {
  let fullName = document.forms[0]["full_name"].value;
  let emailAddress = document.forms[0]["email_address"].value;
  let phoneNumber = document.forms[0]["phone_number"].value;
  let address = document.forms[0]["address"].value;

  if (fullName === "") {
    alert("Please enter your full name.");
    return false;
  }
  if (emailAddress === "") {
    alert("Please enter your email address.");
    return false;
  }
  if (phoneNumber === "") {
    alert("Please enter your phone number.");
    return false;
  }
  if (address === "") {
    alert("Please enter your address.");
    return false;
  }
  return true;
}


function submitForm() {
  let form = document.forms[0];
  let formData = new FormData(form);

  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the server response here
      console.log(xhr.responseText);
    }
  };
  xhr.open("POST", form.action, true);
  xhr.send(formData);
}
