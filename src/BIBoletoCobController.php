<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BIBoletoCob;

/**
 * Description of FbitsController
 *
 * @author weslley
 */
class BIBoletoCobController {
        
    public static $instance;
    
    private $token;
    
    private $config;
    
    private $cert;
    
    private $passphrase;
    
    private $sslKey;
    
    private function __construct() {
        $this->config = [];
        $this->token = null;
    }
    
    public static function getInstance() : BIBoletoCobController{
        if (!isset(self::$instance)) {
            self::$instance = new BIBoletoCobController();
        }
        
        return self::$instance;
    }
    
    public function getToken() {
        return $this->token;
    }

    public function setToken($token) {
        $this->token = $token;
        return $this;
    }
    
    public function getConfig() {
        return $this->config;
    }

    public function setConfig(array $config) {
        $this->config = $config;
        return $this;
    }
    
    public function getCert() {
        return $this->cert;
    }

    public function getPassphrase() {
        return $this->passphrase;
    }

    public function getSslKey() {
        return $this->sslKey;
    }

    public function setCert($cert) {
        $this->cert = $cert;
        return $this;
    }

    public function setPassphrase($passphrase) {
        $this->passphrase = $passphrase;
        return $this;
    }

    public function setSslKey($sslKey) {
        $this->sslKey = $sslKey;
        return $this;
    }
}
