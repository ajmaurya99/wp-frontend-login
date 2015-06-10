<?php
/* function ajax url */

function st_ajaxurl() {
    ?>
    <script>
        var ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>';
    </script>
    <?php
}

add_action('wp_head', 'st_ajaxurl');

/* User Registeration & validation */

function st_handle_registration() {

    if ($_POST['action'] == 'register_action') {

        $error = '';

        $uname = trim($_POST['username']);
        $email = trim($_POST['mail_id']);
        $fname = trim($_POST['firname']);
        $lname = trim($_POST['lasname']);
        $pswrd = $_POST['passwrd'];

        if (empty($_POST['username']))
            $error .= '<p class="error">Enter Username</p>';

        if (empty($_POST['mail_id']))
            $error .= '<p class="error">Enter Email Id</p>';
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $error .= '<p class="error">Enter Valid Email</p>';

        if (empty($_POST['passwrd']))
            $error .= '<p class="error">Password should not be blank</p>';

        if (empty($_POST['firname']))
            $error .= '<p class="error">Enter First Name</p>';
        elseif (!preg_match("/^[a-zA-Z'-]+$/", $fname))
            $error .= '<p class="error">Enter Valid First Name</p>';

        if (empty($_POST['lasname']))
            $error .= '<p class="error">Enter Last Name</p>';
        elseif (!preg_match("/^[a-zA-Z'-]+$/", $lname))
            $error .= '<p class="error">Enter Valid Last Name</p>';

        if (empty($error)) {

            $user_id = username_exists($uname);
            if (email_exists($email) == true || username_exists($email) == true) {
                echo '<p class="error">email  exists exists</p>';
            } else {
                $status = wp_create_user($uname, $pswrd, $email);
                if (is_wp_error($status)) {

                    $msg = '';

                    foreach ($status->errors as $key => $val) {

                        foreach ($val as $k => $v) {

                            $msg = '<p class="error">' . $v . '</p>';
                        }
                    }

                    echo $msg;
                } else {

                    $msg = '<p class="success">Registration Successful</p>';

                    echo $msg;
                }
            }
        } else {

            echo $error;
        }
        die(1);
    }
}

add_action('wp_ajax_register_action', 'st_handle_registration');
add_action('wp_ajax_nopriv_register_action', 'st_handle_registration');

/* add additional meta information */

function user_metadata($user_id) {

    if (!empty($_POST['firname']) && !empty($_POST['lasname'])) {

        update_user_meta($user_id, 'first_name', trim($_POST['firname']));
        update_user_meta($user_id, 'last_name', trim($_POST['lasname']));
    }

    update_user_meta($user_id, 'show_admin_bar_front', false);
}

add_action('user_register', 'user_metadata');
add_action('profile_update', 'user_metadata');

