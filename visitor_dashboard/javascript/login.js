const toggler = document.querySelector(".toggler");
const input = document.querySelector(".pass");
const input2 = document.querySelector(".pass2");
const toggler2 = document.querySelector(".toggler2");
const input3 = document.querySelector(".pass3");
const toggler3 = document.querySelector(".toggler3");
const passwordInput = document.getElementById("password1");
const confirmPasswordInput = document.getElementById("confirm_password");
const passwordStatus = document.getElementById("password_status");
let passwordStrength = 'weak';
const passwordStrengthDiv = document.getElementById('passcheck');

    toggler.addEventListener("click", () => {
      if (input.type === "password") {
        input.type = "text";
        toggler.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        input.type = "password";
        toggler.classList.replace("fa-eye", "fa-eye-slash");
      }
    })

    toggler2.addEventListener("click", () => {
      if (input2.type === "password") {
        input2.type = "text";
        toggler2.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        input2.type = "password";
        toggler2.classList.replace("fa-eye", "fa-eye-slash");
      }
    })

    toggler3.addEventListener("click", () => {
      if (input3.type === "password") {
        input3.type = "text";
        toggler3.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        input3.type = "password";
        toggler3.classList.replace("fa-eye", "fa-eye-slash");
      }
    })

document.querySelectorAll('.toggle').forEach(toggle => {
    toggle.addEventListener('click', () => {
       document.querySelector('.wrapper').classList.toggle('flip');
    });
 });

 function checkEmailAvailability() {
  const email = document.getElementById("email").value;
  const emailStatus = document.getElementById("email_status");

  if (email === "") {
    emailStatus.innerHTML = "";
    return;
  }

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "check_email.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
          emailStatus.innerHTML = xhr.responseText;
      }
  };
  xhr.send("email=" + encodeURIComponent(email));
}
// Select the password and confirm password input fields

// Function to check if passwords match
function checkPasswordMatch() {
    const password = passwordInput.value;
    const confirmPassword = confirmPasswordInput.value;

    if (password === confirmPassword && password !== "") {
        passwordStatus.innerHTML = ""; // Clear the status if passwords match
    } else {
        passwordStatus.innerHTML = "Passwords do not match"; // Display the mismatch message
    }
}

// Add event listeners for both inputs
passwordInput.addEventListener("input", checkPasswordMatch);
confirmPasswordInput.addEventListener("input", checkPasswordMatch);

function validateEmail(email) {
  const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return regex.test(email);
}

passwordInput.addEventListener('input', () => {
    const password = passwordInput.value;
    const strength = checkPasswordStrength(password);
    passwordStrengthDiv.innerHTML = strength.message;
    passwordStrengthDiv.className = strength.classs;
});

function checkPasswordStrength(password) {
    let strength = 0;
    let message = '';
    let classs = '';

    // Check for length
    if (password.length < 8) {
        message = 'Password is too short';
        classs = 'weak';
    } else {
        strength += 1;
    }

    // Check for uppercase letters
    if (/[A-Z]/.test(password)) {
        strength += 1;
    } else {
        message = 'Password should contain at least one uppercase letter';
        classs = 'weak';
    }

    // Check for lowercase letters
    if (/[a-z]/.test(password)) {
        strength += 1;
    } else {
        message = 'Password should contain at least one lowercase letter';
        classs = 'weak';
    }

    // Check for numbers
    if (/[0-9]/.test(password)) {
        strength += 1;
    } else {
        message = 'Password should contain at least one number';
        classs = 'weak';
    }

    // Check for special characters
    if (/[^A-Za-z0-9]/.test(password)) {
        strength += 1;
    } else {
        message = 'Password should contain at least one special character';
        classs = 'weak';
    }

    // Determine password strength
    if (strength === 5) {
        message = 'Password is strong';
        passwordStrength = 'strong';
        classs = 'strong';
    } else if (strength >= 3) {
        message = 'Password is medium';
        passwordStrength = 'medium';
        classs = 'medium';
    } else {
        message = 'Password is weak';
        passwordStrength = 'weak';
        classs = 'weak';
    }

    return { message, classs };
}

function validateForm() {
  const password = document.getElementById("password1").value;
  const confirmPassword = document.getElementById("confirm_password").value;
  const passwordStatus = document.getElementById("password_status");
  const email = document.getElementById("email").value;
  const emailStatus = document.getElementById("email_status");
  const popup = document.getElementById("email_error_popup");
  const email_error_message = document.getElementById("email_error_message");
 
  if (!validateEmail(email)) {
    email_error_message.innerHTML = "Invalid Email";
    popup.classList.add('show');
    return false;
    } else{
    popup.classList.remove('show');
  }


  return true;
}
