<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BIBoletoCob;

/**
 * Description of Autorizacao
 *
 * @author weslley
 */
class Autorizacao extends Core\Http{
    
    const SCOPE_BOLETO_COBRANCA_READ = 'boleto-cobranca.read';
    const SCOPE_BOLETO_COBRANCA_WRITE = 'boleto-cobranca.write';
    const SCOPE_PAGAMENTO_BOLETO_WRITE = 'pagamento-boleto.write';
    const SCOPE_PAGAMENTO_BOLETO_READ = 'pagamento-boleto.read';
    
    public function __construct() {
        $controller = BIBoletoCobController::getInstance();        
        parent::__construct($controller->getConfig());
    }
    
    public function obterToken($clientId, $clientSecret, $scope){
        
        $controller = BIBoletoCobController::getInstance();
        
        $response = $this->http->post("token", array(
            "json" => [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'grant_type' => 'client_credentials',
                'scope' => $scope,
            ]
        ));

        $response = (string)$response->getBody();

        return json_decode($response);
    }
    
}
