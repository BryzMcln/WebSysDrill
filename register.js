function validateForm() {
  var firstName = document.getElementById("first_name").value;
  var lastName = document.getElementById("last_name").value;
  var email = document.getElementById("email").value;
  var mobileNumber = document.getElementById("phone_num").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm_password").value;

  // Check if email contains @ symbol
  if (email.indexOf("@") === -1) {
    alert("Enter a valid email address");
    return false;
  }

  // Check if mobile number has 11 digits
  if (mobileNumber.length !== 11) {
    alert("Mobile Number should have exactly 11 digits");
    return false;
  }

  if (firstName.length < 5 || firstName.length > 50) {
    alert("First Name should have 5 to 50 characters");
    return false;
  }

  if (lastName.length < 5 || lastName.length > 50) {
    alert("Last Name should have 5 to 50 characters");
    return false;
  }

  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email)) {
    alert("Enter a valid email address");
    return false;
  }

  var mobileNumberPattern = /^[0-9]{11}$/;
  if (!mobileNumberPattern.test(mobileNumber)) {
    alert("Mobile Number should have 11 digits");
    return false;
  }

  var passwordPattern =
    /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{11,}$/;
  if (!passwordPattern.test(password)) {
    alert(
      "Password should have at least 11 characters, including a capital letter, a number, and a special character"
    );
    return false;
  }

  if (password !== confirmPassword) {
    alert("Passwords do not match");
    return false;
  }

  return true;
}
