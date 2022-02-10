<?php

namespace App\Models;

use App\Libraries\Feature;
use CodeIgniter\Model;

class Features_model extends Model
{
    private $features;

    // ========================================================================
    public function __construct()
    {
       $this->features = $this->load_features();
    } 

    // ========================================================================
    public function get_all_features()
    {        
       return $this->features; 
    }

    // ========================================================================
    public function get_open_features()
    {
        $features = [];
        foreach($this->features as $feature){
            if($feature->access_level == 0){
                    $features[] = $feature;
                }
            }
            return $features;
    }

    // ========================================================================
    private function load_features()
    {
        $features = [];

        $features[] = new Feature('Criar MD5','Tools','create_md5');
        $features[] = new Feature('Criar SHA1','Tools','create_sha1');
        $features[] = new Feature('Criar número aleatório','Tools','create_random_number', 1);

        return $features;
    }
}