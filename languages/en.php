<?php

// English

return [
    'yes'                        => 'Yes',
    'no'                         => 'No',
    'ok'                         => 'Ok',  
    'accept'                     => 'Accept',
    'cancel'                     => 'Cancel',
    'login'                      => 'Login',
    'logout'                     => 'Logout',
    'sign in'                    => 'Sig In',
    'email'                      => 'Email',
    'password'                   => 'Passoword',

    // -----------------------------------------------
    // new user account
    // -----------------------------------------------
    'new_user_title'                => 'New user account',
    'new_user_valid_email'          => 'Insert a valid email',
    'new_user_repeat_password'      => 'Repeat the password', 
    'new_user_create_account'       => 'Create account',
    'new_user_already_have_account' => 'Already have an account',
    'new_user_recover_passoword'    => 'Recovery password',
    'new_user_disclaimer'           => 'Your account will only be available after email confirmation.',

    // ----------------------------------------
    // features
    // ----------------------------------------
    'ft_create_md5_hash'   => 'Create MD5 hash',
    'ft_create_sha1_hash'  => 'Create SH1 hash',
    'ft_create_random_number' => 'Create random number',

    // new account errors
    'new_account_error_1' => 'The email is not verified.',
    'new_account_error_2' => 'The account exists, but it is not active.',
    'new_account_error_3' => 'The account is not available to receive newsletters.',
    'new_account_error_4' => 'The account is already active.',
    'new_account_send_verification_email' => 'Resend message to verify email.',
    'new_account_activate_newsletters' => 'Do you want to receive <i>newsletters</i>',    
    'new_account_final_message_title' => 'EMAIL VALIDATION',
    'new_account_final_message_message' => 'Please, check you email inbox. An email was sent to <strong style="color: yellow;">^</strong> in order to validate your account.',                                    
    'new_account_email_verified' => 'Your account was validated with success.<br>Welcome to this plataform.',

    // validations errors
    'error_field_required' => '{field} field is required.',
    'error_valid_email' => '{field} must be a valid email.',
    'error_field_min_length' => '{field} field must have at least {parameter} characters.',
    'error_field_max_length' => '{field} field must have at most {parameter} characters.',
    'error_password_regex' => '{field} must have at least one uppercase, one lowercase, and one digit.',
    'error_repeat_password_not_matching' => 'Both passwords must match.',
];