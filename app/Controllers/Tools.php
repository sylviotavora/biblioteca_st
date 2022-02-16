<?php

namespace App\Controllers;

use App\Models\Features_model;

// ============================================================================
class Tools extends BaseController
{

    // ========================================================================
    public function create_md5()
    {
        // check access
        if(!check_feature_permission_access('create_md5')){
            return redirect()->to('main');
        }

        $features_model = new Features_model();

        $data['LNG'] = $this->LNG;
        $data['feature'] = $features_model->get_feature('create_md5');


        // =======================================================================
        if($this->request->getMethod() == 'post'){  
            
            $data['initial_value'] = $this->request->getPost('text_value');
            $data['final_value'] = md5($this->request->getPost('text_value'));

        }

        // display the feature view
        return view('tools/create_md5_hash', $data);
    }







    // ============================================================================
    public function create_sha1()
    {
        // check access
        if(!check_feature_permission_access('create_sha1')){
            return redirect()->to('main');
        }

        $texto = "texto de teste";
        echo "<p>Texto: <strong>" .$texto . "</strong></p><p>Hash: <strong>" . sha1($texto) ."</strong></p>";
    }

    // ============================================================================
    public function create_random_number()
    {
        // check access
        if(!check_feature_permission_access('create_random_number')){
            return redirect()->to('main');
        }

        $valor = rand(0,1000);
        echo "<p>Valor aleatório: <strong>" .$valor . "</strong></p>";
    }
}    