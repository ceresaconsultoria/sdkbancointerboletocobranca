<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BIBoletoCob\Core;

use GuzzleHttp\Client;

/**
 * Description of FbitsHttp
 *
 * @author weslley
 */
class Http {
    
    protected $http;
    
    const BASE_URL = "https://cdpj.partners.bancointer.com.br/oauth/v2/";
           
    public function __construct(array $config = []) {
        $defaultConfig = array(
            'base_uri' => self::BASE_URL,
            \GuzzleHttp\RequestOptions::TIMEOUT => 30,
            \GuzzleHttp\RequestOptions::HEADERS => array(
                'content-type' => 'application/json'
            )
        );
        
        $defaultConfig = array_merge($defaultConfig, $config);
                
        $this->http = new Client($defaultConfig);
    }
    
}
