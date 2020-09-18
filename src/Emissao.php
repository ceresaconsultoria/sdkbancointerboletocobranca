<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BIBoletoCob;

/**
 * Description of GerarBoleto
 *
 * @author weslley
 */
class Emissao extends Core\Http{
    
    public function __construct() {
        $controller = BIBoletoCobController::getInstance();        
        parent::__construct($controller->getConfig());
    }
    
    public function incluir(array $body){
        $controller = BIBoletoCobController::getInstance();
        
        $response = $this->http->post("/", array(
            "headers" => [
                "x-inter-conta-corrente" => $controller->getToken()
            ],
            "json" => $body,
            "cert" => [$controller->getCert(), $controller->getPassphrase()],
            "ssl_key" => [$controller->getSslKey(), $controller->getPassphrase()]
        ));

        $response = (string)$response->getBody();

        return json_decode($response);
    }
}
