document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('patientForm');

    // Validation logic
    const namePattern = /^[A-Za-z\s]+$/;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phonePattern = /^0[0-9]{9}$/; // Updated phone pattern
    const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!]).{8,}$/;

    function validateName() {
        const errorMessage = document.getElementById('nameError');
        if (!namePattern.test(form.FullName.value)) {
            errorMessage.textContent = 'Full name should contain only alphabetic characters.';
            return false;
        } else {
            errorMessage.textContent = '';
            return true;
        }
    }

   function validateDob() {
    const errorMessage = document.getElementById('dobError');
    const dobValue = new Date(document.getElementById('dob').value); // Assuming you have a DOB input field
    const today = new Date();
    const age = today.getFullYear() - dobValue.getFullYear();
    
    if (dobValue > today || age < 10) {
        errorMessage.textContent = 'Date of birth must result in an age of at least 10 years.';
        return false;
    } else {
        errorMessage.textContent = '';
        return true;
    }
}


    function validateEmail() {
        const errorMessage = document.getElementById('emailError');
        if (!emailPattern.test(form.useremail.value)) {
            errorMessage.textContent = 'Enter a valid email address.';
            return false;
        } else {
            errorMessage.textContent = '';
            return true;
        }
    }

    function validatePhone() {
        const errorMessage = document.getElementById('contactPhoneError');
        if (!phonePattern.test(form.ContactPhoneNumber.value)) {
            errorMessage.textContent = 'Phone number must be in the format: 0xxxxxxxxx.';
            return false;
        } else {
            errorMessage.textContent = '';
            return true;
        }
    }

    function validateIDNumber() {
        const idNumber = form['ID Number'].value;
        const idNumberError = document.getElementById('idNumberError'); // Updated ID number error element
        if (idNumber.length === 8 || idNumber.length === 9) {
            idNumberError.textContent = '';
            return true;
        } else {
            idNumberError.textContent = 'ID Number must be exactly 8 or 9 characters long.';
            return false;
        }
    }

    function validateContactName() {
        const errorMessage = document.getElementById('contactNameError');
        if (!namePattern.test(form.ContactFullName.value)) {
            errorMessage.textContent = 'Contact name should contain only alphabetic characters.';
            return false;
        } else {
            errorMessage.textContent = '';
            return true;
        }
    }

    function validateContactPhone() {
        const errorMessage = document.getElementById('contactPhoneError');
        if (!phonePattern.test(form.ContactPhoneNumber.value)) {
            errorMessage.textContent = 'Phone number must be in the format: 0xxxxxxxxx.';
            return false;
        } else {
            errorMessage.textContent = '';
            return true;
        }
    }

    function isFormValid() {
        return validateName() &&
               validateAge() &&
               validateEmail() &&
               validatePhone() &&
               validateIDNumber() &&
               validateContactName() &&
               validateContactPhone();
    }

    form.addEventListener('input', function(event) {
        switch (event.target.name) {
            case 'FullName':
                validateName();
                break;
            case 'age':
                validateAge();
                break;
            case 'useremail':
                validateEmail();
                break;
            case 'ContactPhoneNumber':
                validatePhone();
                break;
            case 'ID Number':
                validateIDNumber(); // Ensure real-time validation for ID Number
                break;
            case 'ContactFullName':
                validateContactName();
                break;
        }
    });

    form.addEventListener('submit', function(event) {
        if (!isFormValid()) {
            event.preventDefault();
            alert('Please correct the errors in the form before submitting.');
        } else {
            const fullName = form.FullName.value;
            const userAccount = form.user_account.value;
            alert(`You, ${fullName}, have successfully registered as ${userAccount}.`);
            form.reset();
        }
    });

    // Function to get password strength
    function getPasswordStrength(password) {
        let strength = 'Weak';
        if (password.length >= 8) {
            if (/[A-Z]/.test(password) && /[a-z]/.test(password) && /\d/.test(password) && /[@#$%^&+=!]/.test(password)) {
                strength = 'Strong';
            } else if ((/[A-Z]/.test(password) || /[a-z]/.test(password)) && /\d/.test(password)) {
                strength = 'Medium';
            }
        }
        return strength;
    }
});

