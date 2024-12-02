document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('.needs-validation');
  form.addEventListener(
    'submit',
    function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    },
    false,
  );

  // Additional validation for password matching
  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('confirm_password');
  confirmPassword.addEventListener('input', function () {
    if (password.value !== confirmPassword.value) {
      confirmPassword.setCustomValidity('Passwords do not match');
      confirmPassword.classList.add('is-invalid');
    } else {
      confirmPassword.setCustomValidity('');
      confirmPassword.classList.remove('is-invalid');
      confirmPassword.classList.add('is-valid');
    }
  });
});
