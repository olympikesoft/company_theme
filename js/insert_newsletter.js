$(document).ready(function () {
    $("#ajaxform").on('submit', function (e) {
         var formData =  $('input[name=email]').val();
        $.ajax({
            type: 'POST',
            url: '/php/newsletter.php',
            data: $(this).serialize(),
            success: function (data) {
                 alert("Thank your for submit!");
                $("#show").html("Thank you for submit")
                
                $('#show').hide();
                $('#ajaxform').hide();
            }
        });
        e.preventDefault();
    });
});