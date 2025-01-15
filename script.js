document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Get values from inputs
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var rememberMe = document.getElementById('remember-me').checked;

    // Simple validation: check if username and password are not empty
    if (username.trim() === "" || password.trim() === "") {
        alert("Please enter both username and password.");}
         
  alert('Login successful!');
  loginForm.reset();
});
