<?php

namespace App\Models;

use App\Libraries\Feature;
use CodeIgniter\Model;

// ========================================================================
class Users_model extends Model
{
    // ========================================================================
    public function create_new_user_account($username, $password)
    {               
        //create new user account
        $db = db_connect();

        // -------------------------------------------
        //check if the user already exists
        $params = [
            $username
        ];
        $results = $db->query(
            "SELECT * " .
            
            "FROM users " .
            "WHERE AES_ENCRYPT(?, UNHEX(SHA2('" . MYSQL_AES_KEY . "', 512))) = username",
            $params
        )->getResultObject();

        if (count($results) != 0) {

            // check what is the account status
            $account = $results[0];

            // check if the accout has an unconfirmed email
            if(empty($account->email_verified)){
                return [
                    'status' => 'ERROR',
                    'message' => 'Email is not verified',
                    'data' => $account
                ];
            }

            // check if the account is soft deleted
            if(!empty($account->deleted_at)){
                return [
                    'status' => 'ERROR',
                    'message' => 'Account is deleted',
                    'data' => $account
                ]; 
            }

            // check if the user is available to receive the newsletter
            if(empty($account->receive_newsletter)){
                return [
                    'status' => 'ERROR',
                    'message' => 'Account is not available to receive newsletter',
                    'data' => $account
                ];
            };

            return [
                'status' => 'ERROR',
                'message' => 'Email already an active account',
                'data' => $account
            ];
        }

        // --------------------------------------------
        // add the new user account to the database
        $user_code = generate_random_hash();
        $params = [
            $username,
            password_hash($password, PASSWORD_DEFAULT),
            $user_code
            
        ];
        $db->query(
            "INSERT INTO users(username, passwrd, user_code, receive_newsletter, created_at, updated_at) VALUES(" .
                "AES_ENCRYPT(?, UNHEX(SHA2('" . MYSQL_AES_KEY . "',512))), " .
                "?, " .
                "?, " .
                "NOW(), " .
                "NOW(), " .
                "NOW()" .
                ")",
            $params
        );

        return [
            'status' => 'SUCCESS',
            'message' => 'SUCCESS',
            'user_code' => $user_code,
        ];
    }

    // ========================================================================
    public function verify_email($user_code)
    {
       // place a datetime in the user's email verified, if the user exists
       $params = [
           $user_code
       ];

       // first check if there is a username with the specified user_code
       $db = db_connect();
       $results = $db->query("SELECT id_user FROM users WHERE user_code = ?", $params)->getResultObject();
       if(count($results) != 1){
            return [
                'status' => 'ERROR',
                'message' => 'User code does not exists'
            ];
       }

       // verify user email
       $db->query(
           "UPDATE users " .
                "SET email_verified = NOW(), " .
                "updated_at = NOW() ". 
                "WHERE user_code = ? " . 
                "AND email_verified IS NULL",
            $params
        );

       return [
        'status' => 'SUCCESS',
        'message' => 'Email with user_code: ' . $user_code . ' was verified with success'
        ];
    }

    // ========================================================================
    public function get_unconfirmed_email_user_data($id_user)
    {
        // get the user that does not have already validate his account (email)
        $params = [
            $id_user
        ];

        $db = db_connect();
        $results = $db->query(
        "SELECT " .
        "AES_DECRYPT(username, UNHEX(SHA2('" . MYSQL_AES_KEY . "', 512))) username, " .
        "user_code " .
        "FROM users " . 
        "WHERE 1 " .
        "AND id_user = ? " .
        "AND email_verified IS NULL " .
        "AND deleted_at IS NULL"
        , $params)->getResultObject();

        // check if there are results    
        if(count($results) != 1){
            return [
                'status' => 'ERROR',
                'message' => 'User account not found'
            ];
        } else {
            return [
                'status' => 'SUCCESS',
                'message' => 'SUCCESS',
                'data' => $results[0]
            ];
        }
    }

    // ========================================================================
    public function reactivate_newsletters($id_user)
    {
        $params = [
            $id_user
        ];

        $db = db_connect();

        $results = $db->query(
            "SELECT id_user FROM users WHERE 1 " .
            "AND id_user = ? " .
            "AND email_verified IS NOT NULL " .    
            "AND deleted_at IS NULL " 
        , $params)->getResultObject();

        if(count($results) != 1){
            return [
                'status' => 'ERROR',
                'message' => 'The user account is not suitable to enable newsletters'
            ];
        }

        // enable receive newsletters
        $db->query(
            "UPDATE users SET " .
            "receive_newsletter = NOW(), " .
            "updated_at = NOW() " .
            "WHERE id_user = ?"
            , $params);

        return [
            'status' => 'SUCCESS',
            'message' => 'SUCCESS'
        ];
    }

    // ========================================================================
    public function get_all_users()
    {
        $db = db_connect();
        $results = $db->query(
            "SELECT " .
            "AES_DECRYPT(username, UNHEX(SHA2('" . MYSQL_AES_KEY . "',512))) username," .
            "user_code " .
            "FROM users"
        )->getResultObject();

        return $results;
    }
}
