<?php

namespace App\Controllers;

use App\Models\Features_model;
use App\Models\Users_model;

class Main extends BaseController
{
    // ========================================================================
    public function index()
    {
        $data['LNG'] = $this->LNG;

        $features = new Features_model();

        if (!session()->has('user')) {
            $data['features'] = $features->get_open_features();
        } else {
            $data['features'] = $features->get_all_features();
        }

        echo view('main/home', $data);
    }

    // ========================================================================
    public function change_language($lang = null)
    {
        // change the plataform language
        if (empty($lang)) {
            return view('errors/html/error_404');
        }

        helper('cookie');

        // create the language cookie
        set_cookie('stav_lang', $lang, (86400 * 365));

        // redirect to main
        return redirect()->to('main')->withCookies();
    }






    // ========================================================================
    // NOVO USUÁRIO
    // ========================================================================
    public function new_user()
    {
        // check session
        if (check_session()) {
            return redirect()->to('main');
        }

        // check if there are form validation errors
        if(session()->has('validation_errors')){
            $data['validation_errors'] = session()->getFlashdata('validation_errors');
        }

        $data['LNG'] = $this->LNG;
        return view('main/new_user_frm', $data);
    }

    // ========================================================================
    public function new_user_submit()
    {
        // check session
        if (check_session()) {
            return redirect()->to('main');
        }

        // check if there was a post
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('main');
        }

            
        // form validation
        $validation = $this->validate([
            'text_username  ' => [
                'label' => $this->LNG->TXT('email'),
                'rules'  => 'required|valid_email|min_length[10]|max_length[50]',
                'errors' => [
                    'required' => $this->LNG->TXT('error_field_required'),
                    'valid_email' => $this->LNG->TXT('error_valid_email'), 
                    'min_length' => $this->LNG->TXT('error_field_min_length'),  
                    'max_length' => $this->LNG->TXT('error_field_max_length'),
                    
                ]
            ],
            'text_password' => [
                'label' => $this->LNG->TXT('password'),
                'rules' => 'required|min_length[6]|max_length[16]|regex_match[/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)/]',
                'errors' => [
                    'required' => $this->LNG->TXT('error_field_required'),
                    'min_length' => $this->LNG->TXT('error_field_min_length'),
                    'max_length' => $this->LNG->TXT('error_field_max_length'),
                    'regex_match' => $this->LNG->TXT('error_password_regex'),
                ]
            ],
            'text_repeat_password' => [
                'label' => $this->LNG->TXT('new_user_repeat_password'),
                'rules' => 'required|min_length[6]|max_length[16]|regex_match[/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)/]|matches[text_password]',
                'errors' => [
                    'required' => $this->LNG->TXT('error_field_required'),
                    'min_length' => $this->LNG->TXT('error_field_min_length'),
                    'max_length' => $this->LNG->TXT('error_field_max_length'),
                    'regex_match' => $this->LNG->TXT('error_password_regex'),
                    'matches' => $this->LNG->TXT('error_repeat_password_not_matching'),
                ]
            ]
        ]);

        if (!$validation) {

            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // ---------------------
        // get post data
        $username = $this->request->getPost('text_username');
        $password = $this->request->getPost('text_password');
        
        $users_model = new Users_model();
        $results = $users_model->create_new_user_account($username, $password);

        if($results['status'] == 'ERROR'){
            die('UPS!');
        }

        die('OK!');
    }





    // ========================================================================
    // USUÁRIO
    // ========================================================================
    public function login_teste()
    {
        // TPM 
        session()->set('user', [
            'id_user' => 1,
            'username' => 'usuario@teste.com',
            'access_level' => 1
        ]);
        return redirect()->to('main');
    }

    // ========================================================================
    public function logout_teste()
    {
        session()->remove('user');
        return redirect()->to('main');
    }











    // ========================================================================
    public function sessao()
    {
        printData(session('user'));
    }
}
