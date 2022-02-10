<?php

namespace App\Controllers;

use App\Models\Features_model;

class Main extends BaseController
{
    // ========================================================================
    public function index()
    {
        $data['LNG'] = $this->LNG;

        $features = new Features_model();

        if(!session()->has('user')){
            $data['features'] = $features->get_open_features();
        } else {
            $data['features'] = $features->get_all_features();
        }

        echo view('home', $data);

        // printData($funcionalidades);
        // die('FIM');

    }

    // ========================================================================
    public function change_language($lang = null)
    {
        // change the plataform language
        if(empty($lang)){
            return view('errors/html/error_404');
        }

        helper('cookie');

        // create the language cookie
        set_cookie('stav_lang', $lang, (86400 * 365));

        // redirect to main
        return redirect()->to('main')->withCookies();
    }

    // ========================================================================
    // USUÁRIO
    // ========================================================================
    public function login_teste()
    {
        // TPM 
        session()->set('user',[
            'id_user' => 1,
            'username' => 'usuario@teste.com'
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





