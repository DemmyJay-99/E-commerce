
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