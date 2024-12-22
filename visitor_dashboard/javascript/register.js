// Toggle password visibility
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
}

// Password strength check
function checkPasswordStrength() {
    const password = document.getElementById("password").value;

    const patterns = {
        uppercase: /[A-Z]/,
        lowercase: /[a-z]/,
        number: /[0-9]/,
        special: /[!@#\$%\^&\*\.]/,
    };

    document.getElementById("uppercase").style.color = patterns.uppercase.test(password) ? "green" : "red";
    document.getElementById("lowercase").style.color = patterns.lowercase.test(password) ? "green" : "red";
    document.getElementById("number").style.color = patterns.number.test(password) ? "green" : "red";
    document.getElementById("special").style.color = patterns.special.test(password) ? "green" : "red";
    document.getElementById("length").style.color = password.length >= 12 ? "green" : "red";
}

// Email availability check with AJAX
function checkEmailAvailability() {
    const email = document.getElementById("email").value;
    const emailStatus = document.getElementById("email_status");

    if (!email.endsWith(".com")) {
        emailStatus.innerHTML = "<span style='color:red;'>Email must end with '.com'</span>";
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

// Form validation
function validateForm() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;
    const passwordStatus = document.getElementById("password_status");

    if (password !== confirmPassword) {
        passwordStatus.innerHTML = "Passwords do not match!";
        passwordStatus.style.color = "red";
        return false;
    }
    return true;
}