<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BIBoletoCob;

/**
 * Description of PDF
 *
 * @author weslley
 */
class PDF extends Core\Http{
    public function __construct() {
        $controller = BIBoletoCobController::getInstance();        
        parent::__construct($controller->getConfig());
    }
    
    public function gerar($nossoNumero){
        $controller = BIBoletoCobController::getInstance();
        
        $response = $this->http->get("cobranca/v2/boletos/".$nossoNumero."/pdf", array(
            "headers" => [
                "Authorization" => $controller->getTokenType() . ' ' . $controller->getAccessToken()
            ],
            "cert" => $controller->getCert(),
            "ssl_key" => $controller->getSslKey()
        ));

        return $response->getBody()->getContents();
    }
}
