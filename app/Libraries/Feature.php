<?php

namespace App\Libraries;

class Feature
{
    public $name;
    public $controller;
    public $initial_method;
    public $submission_method;
    public $access_level;
    public $feature_icon;

    public function __construct($name, $controller, $initial_method, $submission_method = null, $access_level = 0, $feature_icon = null)
    {
        $this->name = $name;
        $this->controller = $controller;  
        $this->initial_method = $initial_method;
        $this->submission_method = $submission_method; 
        $this->access_level = $access_level;  
        $this->feature_icon = $feature_icon;
    }     
}