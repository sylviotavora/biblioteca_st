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
    public function get_feature($key)
    {
        return $this->features[$key];
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

        $features['create_md5'] = new Feature('ft_create_md5_hash','tools','create_md5', null, 0);
        $features['create_sha1'] = new Feature('ft_create_sha1_hash','tools','create_sha1', null, 0);
        $features['create_random_number'] = new Feature('ft_create_random_number','tools','create_random_number', null, 1);

        return $features;
    }
}