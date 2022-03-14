<?php

namespace App\Libraries;

// ========================================================================
class Language
{
    protected $select_language = null;
    protected $translations = null;
    protected $available_languages = ['pt', 'en'];

    public function __construct()
    {        
        // define the language  
        if(isset($_COOKIE['stav_lang'])){            
            $language = $_COOKIE['stav_lang'];            
        } else {
            $language = 'pt';
        }

        // check if the language is available
        if(!in_array($language, $this->available_languages)){
            $language = 'pt';
        }

        $this->select_language = $language;

        // load translations
        $this->translations = require_once(dirname(__FILE__) . '/../../languages/' . $this->select_language . '.php');
    }

    // ========================================================================
    public function TXT($key, $values = [])
    {
        if(!key_exists($key, $this->translations)){

            return '(...)';

        }else {
            
            if(empty($values)){
                return $this->translations[$key];
            } else {

                // replace ^ by each value in values[]
                $str = str_split($this->translations[$key]);
                $str_final = '';
                $index = 0;

                foreach($str as $char){
                    if($char != '^'){
                        $str_final .= $char;
                    } else {
                        $str_final .= $values[$index++];
                    }
                }
                return $str_final;
            }

        }
    }
}