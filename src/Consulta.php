<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BIBoletoCob;

/**
 * Description of Consulta
 *
 * @author weslley
 */
class Consulta {
    public function __construct() {
        $controller = BIBoletoCobController::getInstance();        
        parent::__construct($controller->getConfig());
    }
    
    public function listar(array $query = []){
        $controller = BIBoletoCobController::getInstance();
        
        $response = $this->http->get("/". http_build_query($query), array(
            "headers" => [
                "x-inter-conta-corrente" => $controller->getToken(),
                "cert" => [$controller->getCert(), $controller->getPassphrase()],
                "ssl_key" => [$controller->getSslKey(), $controller->getPassphrase()],
                'verify' => true
            ]
        ));

        $response = (string)$response->getBody();

        return json_decode($response);
    }
    
    public function detalhes($nossoNumero){
        $controller = BIBoletoCobController::getInstance();
        
        $response = $this->http->get("/".$nossoNumero, array(
            "headers" => [
                "x-inter-conta-corrente" => $controller->getToken(),
                "cert" => [$controller->getCert(), $controller->getPassphrase()],
                "ssl_key" => [$controller->getSslKey(), $controller->getPassphrase()],
                'verify' => true
            ]
        ));

        $response = (string)$response->getBody();

        return json_decode($response);
    }
}
