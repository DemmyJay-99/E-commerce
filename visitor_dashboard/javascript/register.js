 // Username availability and length check
 function checkUsernameAvailability() {
    var username = document.getElementById("username").value;
    var usernameStatus = document.getElementById("username_status");

    // Check if username length is less than 3 characters
    if (username.length < 3) {
        usernameStatus.innerHTML = "<span style='color: red;'>Please input a username of over 3 characters</span>";
        return;  // Exit if the username is too short
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "check_username.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            usernameStatus.innerHTML = xhr.responseText;
        }
    };
    xhr.send("username=" + username);
}

// Password strength check
function checkPasswordStrength() {
    var password = document.getElementById("password").value;

    var uppercaseItem = document.getElementById("uppercase");
    var lowercaseItem = document.getElementById("lowercase");
    var numberItem = document.getElementById("number");
    var specialItem = document.getElementById("special");
    var lengthItem = document.getElementById("length");
    var strong = document.getElementById("strong");

    var uppercasePattern = /[A-Z]/;
    var lowercasePattern = /[a-z]/;
    var numberPattern = /[0-9]/;
    var specialPattern = /[!@#\$%\^&\*\.]/;

    if (uppercasePattern.test(password)) {
        uppercaseItem.style.border = "2px solid green";
        uppercaseItem.style.backgroundColor = "blue";
        uppercaseItem.style.transition = ".4s";
        uppercaseItem.innerHTML="&check;";
        // uppercaseItem.style.width = "10px";
    } else {
        uppercaseItem.style.border = "2px solid red";
        uppercaseItem.innerHTML="&times;";
        uppercaseItem.style.backgroundColor = "red";
    }

    if (lowercasePattern.test(password)) {
        lowercaseItem.style.border = "2px solid green";
        lowercaseItem.innerHTML = "&check;";
        lowercaseItem.style.backgroundColor = "blue";
    } else {
        lowercaseItem.style.border = "2px solid red";
        lowercaseItem.innerHTML="&times;";
        lowercaseItem.style.backgroundColor = "red";
    }

    if (numberPattern.test(password)) {
        numberItem.style.border = "2px solid green";
        numberItem.innerHTML = "&check;";
        numberItem.style.backgroundColor = "blue";
    } else {
        numberItem.style.border = "2px solid red";
        numberItem.innerHTML="&times;";
        numberItem.style.backgroundColor = "red";
    }

    if (specialPattern.test(password)) {
        specialItem.style.border = "2px solid green";
        specialItem.innerHTML = "&check;";
        specialItem.style.backgroundColor = "blue";
    } else {
        specialItem.style.border = "2px solid red";
        specialItem.innerHTML = "&times;"
        specialItem.style.backgroundColor = "red";
    }

    if (password.length >= 12) {
        lengthItem.style.border = "2px solid green";
        lengthItem.innerHTML = "&check;";
        lengthItem.style.backgroundColor = "blue"
    } else {
        lengthItem.style.border = "2px solid red";
        lengthItem.innerHTML = "&times;";
          lengthItem.style.backgroundColor = "red";
    }
}

// Email availability check with AJAX
function checkEmailAvailability() {
    var email = document.getElementById("email").value;
    var emailStatus = document.getElementById("email_status");
    if (! email.endsWith(".com")) {
    //  emailStatus.innerHTML="<span style='color:red;'>Email must end with '.com'</span>";
        return; // Exit the function if the email doesn't end with .com
    } else{
        //Clear any previous '.com' error message when valid
        emailStatus.innerHTML ="" ;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "check_email.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            emailStatus.innerHTML = xhr.responseText;
        }
    };
    xhr.send("email=" + encodeURIComponent(email));  // Send email to server
}

// Validate password confirmation and password strength before submitting the form
function validateForm() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
    var passwordStatus = document.getElementById("password_status");

    // Check if passwords match
    if (password !== confirmPassword) {
        passwordStatus.innerHTML = "Passwords do not match!";
        passwordStatus.style.color = "red";
        return false;
    }

    // Ensure that all password strength requirements are met (border should be green)
    if (document.getElementById("uppercase").style.backgroundColor !== "blue" ||
        document.getElementById("lowercase").style.backgroundColor !== "blue" ||
        document.getElementById("number").style.backgroundColor !== "blue" ||
        document.getElementById("special").style.backgroundColor !== "blue" ||
        document.getElementById("length").style.backgroundColor !== "blue") {
        passwordStatus.innerHTML = "Password does not meet the strength requirements.";
        passwordStatus.style.color = "red";
        return false;
    }

    return true; // Allow form submission
}

const passwordInput = document.getElementById('password');
const passwordEye = document.querySelector('.password-eye');
const eyeSlash = document.querySelector('.t');
const eye = document.querySelector('.a');

passwordEye.addEventListener('click', () => {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    eyeSlash.style.display = 'inline';
    eye.style.display = 'none';
    passwordEye.classList.add('active');
  } else {
    passwordInput.type = 'password';
    passwordEye.classList.remove('active');
    eyeSlash.style.display = 'none';
    eye.style.display = 'inline';
  }
});

// function changeTheme() {
//     var body = document.getElementById("body");
//     //  body.style.color = 'white';
//     // themePointer= 0;
//     if (body.style.backgroundColor === 'white') {
//      body.style.backgroundColor= 'darkBlue';
//      body.style.color='white';
//     } else{
//          body.style.backgroundColor = 'white';
//     }
// }