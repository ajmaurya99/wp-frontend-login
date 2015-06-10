
<!-- display Login form -->

<div class="form-wrapper">
    <h2 class="register-heading"><?php _e('Sign Up', 'chefsbasket'); ?></h2>
    <div id="error-message"></div>
    <form method="post" name="st-register-form">
        <div class="form-label"><label for="st-username"><?php _e('Username', 'chefsbasket'); ?></label></div>
        <div class="field"><input type="text" autocomplete="off" name="username" id="st-username" /></div>
        <div class="form-label"><label for="st-email"><?php _e('Email', 'chefsbasket'); ?></label></div>
        <div class="field"><input type="text" autocomplete="off" name="mail" id="st-email" /></div>
        <div class="form-label"><label for="st-psw"><?php _e('Password', 'chefsbasket'); ?></label></div>
        <div class="field"><input type="password" name="password" id="st-psw" /></div>
        <div class="form-label"><label for="st-fname"><?php _e('First Name', 'chefsbasket'); ?></label></div>
        <div class="field"><input type="text" autocomplete="off" name="fname" id="st-fname" /></div>
        <div class="form-label"><label for="st-lname"><?php _e('Last Name', 'chefsbasket'); ?></label></div>
        <div class="field"><input type="text" autocomplete="off" name="lname" id="st-lname" /></div>
        <div class="frm-button"><input type="button" id="register-me" value="Register" /></div>
    </form>
</div>