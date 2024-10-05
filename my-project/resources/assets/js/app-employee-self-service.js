document.addEventListener('DOMContentLoaded', function () {
  // Check if passwords match before submitting the password change form
  const passwordForm = document.querySelector('form[action*="changePassword"]');
  const newPassword = document.getElementById('new_password');
  const confirmPassword = document.getElementById('new_password_confirmation');
  const submitButton = passwordForm.querySelector('button[type="submit"]');

  submitButton.addEventListener('click', function (event) {
    if (newPassword.value !== confirmPassword.value) {
      event.preventDefault();
      alert('New passwords do not match. Please try again.');
    }
  });

  // You can add other logic here, such as phone number formatting, form validation, etc.
});
