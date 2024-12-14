$(document).ready(function() {
    $('#eventForm').on('submit', function(event) {
        var isValid = true;
        // Check if all fields are filled out
        $('#eventForm input, #eventForm select').each(function() {
            if ($(this).val() === "") {
                isValid = false;
                alert("Please fill out this field.");
                return false;
            }
        });

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });
});
