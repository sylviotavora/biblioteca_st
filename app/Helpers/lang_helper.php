<?php

function TXT($key, $lang)
{

    /*
    definir uma lingua padrão
    verificar se existe o cookie da lingua
        - não existe? cria o cookie com o valor  = lingua padrão
        - se existe? carrega a lingua a partir do valor do cookie
    */

    // sets the default language
    $lang = 'pt';

    // check if there is a language cookie
    if(get_cookie('biblio_lang')){

        // set the language
        $lang = get_cookie('biblio_lang');
    } else {

        // create the language cookie
        set_cookie('biblio_lang', $lang, (86400 * 365));
    }

    // check if the language file exists
    if(!file_exists(dirname(__FILE__) . '/../../languages/' . $lang . '.php')){
        die('Erro!');
    }

    // load language file
    $language_items = require(dirname(__FILE__) . '/../../languages/' . $lang . '.php');

    // return the language text
    if(key_exists($key, $language_items)){
        return $language_items[$key];
    } else {
        return '(N/A)';
    }

}