(function ($) {
    $(document).ready(function () {
	
	
	/* Registration Ajax */
    var ajaxUrl = locationHost + appendPath + "/wp-admin/admin-ajax.php";
    $('#register-me').on('click', function () {
        var action = 'register_action';
        var username = jQuery("#st-username").val();
        var mail_id = jQuery("#st-email").val();
        var firname = jQuery("#st-fname").val();
        var lasname = jQuery("#st-lname").val();
        var passwrd = jQuery("#st-psw").val();

        var ajaxdata = {
            action: 'register_action',
            username: username,
            mail_id: mail_id,
            firname: firname,
            lasname: lasname,
            passwrd: passwrd
        };

        $.post(ajaxUrl, ajaxdata, function (res) { // ajaxurl must be defined previously

            $("#error-message").html(res);
        });
    });
    });


})(jQuery);