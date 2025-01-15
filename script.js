function togglePasswordVisibility() {
  const passwordInput = document.getElementById('password');
  const togglePassword = document.querySelector('.toggle-password');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    togglePassword.innerHTML = '<i class="bx bx-hide"></i>';
  } else {
    passwordInput.type = 'password';
    togglePassword.innerHTML = '<i class="bx bx-show"></i>';
  }
}

const signupForm = document.getElementById('signup-form');

signupForm.addEventListener('submit', function(event) {
  event.preventDefault();

  const username = document.getElementById('username').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirm-password').value;

  if (password !== confirmPassword) {
    alert('Passwords do not match!');
    return;
  }

  // Perform further actions like sending data to the server or redirecting to another page
  // You can add your own logic here

  alert('Sign up successful!');
  signupForm.reset();
});