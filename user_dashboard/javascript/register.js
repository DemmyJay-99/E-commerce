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
        uppercaseItem.style.backgroundColor = "lightgreen";
        uppercaseItem.innerHTML="&check;";
        // uppercaseItem.style.width = "10px";
    } else {
        uppercaseItem.style.border = "2px solid red";
        uppercaseItem.innerHTML="&times;At least one uppercase letter (A-Z)";
        uppercaseItem.style.backgroundColor = "red";
    }

    if (lowercasePattern.test(password)) {
        lowercaseItem.style.border = "2px solid green";
        lowercaseItem.innerHTML = "&check;";
        lowercaseItem.style.backgroundColor = "lightgreen";
    } else {
        lowercaseItem.style.border = "2px solid red";
        lowercaseItem.innerHTML="&times;At least one lowercase letter (A-Z)";
        lowercaseItem.style.backgroundColor = "red";
    }

    if (numberPattern.test(password)) {
        numberItem.style.border = "2px solid green";
        numberItem.innerHTML = "&check;";
        numberItem.style.backgroundColor = "lightgreen";
    } else {
        numberItem.style.border = "2px solid red";
        numberItem.innerHTML="&times;At least one number (0-9)";
        numberItem.style.backgroundColor = "red";
    }

    if (specialPattern.test(password)) {
        specialItem.style.border = "2px solid green";
        specialItem.innerHTML = "&check;";
        specialItem.style.backgroundColor = "lightgreen";
    } else {
        specialItem.style.border = "2px solid red";
        specialItem.innerHTML = "&times; At least one special character (!@#$%^&*)"
        specialItem.style.backgroundColor = "red";
    }

    if (password.length >= 12) {
        lengthItem.style.border = "2px solid green";
        lengthItem.innerHTML = "&check;";
        lengthItem.style.backgroundColor = "lightgreen"
    } else {
        lengthItem.style.border = "2px solid red";
        lengthItem.innerHTML = "&times; At least 12 characters long";
          lengthItem.style.backgroundColor = "red";
    }
}

// Email availability check with AJAX
function checkEmailAvailability() {
    var email = document.getElementById("email").value;
    var emailStatus = document.getElementById("email_status");
    if (! email.endsWith(".com")) {
     emailStatus.innerHTML="<span style='color:red;'>Email must end with '.com'</span>";
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
    if (document.getElementById("uppercase").style.borderColor !== "green" ||
        document.getElementById("lowercase").style.borderColor !== "green" ||
        document.getElementById("number").style.borderColor !== "green" ||
        document.getElementById("special").style.borderColor !== "green" ||
        document.getElementById("length").style.borderColor !== "green") {
        passwordStatus.innerHTML = "Password does not meet the strength requirements.";
        passwordStatus.style.color = "red";
        return false;
    }

    return true; // Allow form submission
}

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