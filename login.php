<!--Get logged in users Info--> 
<?php
$user_id = get_current_user_id();
if ($user_id == 0) {
    echo 'You are currently not logged in.';
} else {
    echo 'You are logged in as user ' . $user_id;
}
?>
<?php
$all_meta_for_user = get_user_meta($user_id);
print_r($all_meta_for_user);
?>


<!--Wp Front end login form-->
<?php
$args = array(
    'echo' => true,
    'redirect' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
    'form_id' => 'loginform',
    'label_username' => __('Username'),
    'label_password' => __('Password'),
    'label_remember' => __('Remember Me'),
    'label_log_in' => __('Log In'),
    'id_username' => 'user_login',
    'id_password' => 'user_pass',
    'id_remember' => 'rememberme',
    'id_submit' => 'wp-submit',
    'remember' => true,
    'value_username' => NULL,
    'value_remember' => true
);
?>
<?php wp_login_form($args); ?>
<?php echo '<a href="' . wp_lostpassword_url() . '" title="Lost Password">Lost Password</a>'; ?>