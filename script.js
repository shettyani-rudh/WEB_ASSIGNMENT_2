$(document).ready(function() {
    $('#registrationForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        // Basic client-side validation
        let isValid = true;
        $('.form-group input, .form-group select, .form-group textarea').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).css('border-color', 'red');
            } else {
                $(this).css('border-color', '#bdc3c7');
            }
        });

        // If form is valid, submit via AJAX
        if (isValid) {
            $.ajax({
                type: 'POST',
                url: 'process.php',
                data: $(this).serialize(),
                success: function(response) {
                    // Hide form, show success message
                    $('#registrationForm').hide();
                    $('#submittedData').html(response);
                    $('#successMessage').show();
                },
                error: function() {
                    alert('Registration failed. Please try again.');
                }
            });
        }
    });

    // Optional: Real-time validation
    $('.form-group input, .form-group select, .form-group textarea').on('change', function() {
        if ($(this).val()) {
            $(this).css('border-color', '#bdc3c7');
        }
    });
});