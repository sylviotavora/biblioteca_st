<?php

namespace App\Models;

use App\Libraries\Feature;
use CodeIgniter\Model;

// ========================================================================
class Users_model extends Model
{
    // ========================================================================
    public function create_new_user_account()
    {
        return [
            'status' => 'ERROR',
            'message' => 'This email is a already in use.'
        ];
    }
}