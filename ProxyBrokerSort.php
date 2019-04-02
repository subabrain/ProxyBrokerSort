<?php

class ProxyBrokerSort {
 
    public $proxy_broker_file = "";
    public $dest_file = "proxies/liste_sort";
    public $time_array = array();
    public $ip_array = array();
    public $port_array = array();
    public $back_array = array();
 
    public function __construct() {
        file_put_contents($this->dest_file, "");
    }
    
    public function get_file($file) {
 
        $this->proxy_broker_file = $file;
    }
 
    public function get_time() {
 
        $time_ret = file($this->proxy_broker_file);
 
        foreach ($time_ret as $key => $value) {
 
            preg_match("/([0-9]{1,}\.[0-9]{2})s/", $value, $erg_time);
 
            $this->time_array[] = $erg_time[1];
        }
 
    }
 
    public function get_proxy_ip() {
 
        $prox_ip_ret = file($this->proxy_broker_file);
 
        foreach ($prox_ip_ret as $key => $value) {
 
            preg_match("/(\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b)/i", $value, $erg_ip);
 
            $this->ip_array[] = $erg_ip[1];
        }
 
    }
 
    public function get_proxy_port() {
 
        $port_ret = file($this->proxy_broker_file);
 
        foreach ($port_ret as $key => $value) {
 
            preg_match("/:([0-9]{1,5})/i", $value, $erg_port);
 
            $this->port_array[] = $erg_port[1];
        }
 
    }
 
    public function save_to_file() {
 
       asort($this->time_array);
       
       foreach ($this->time_array as $key => $value) {
           
           $this->back_array[] = $this->ip_array[$key].":".$this->port_array[$key];
           
           file_put_contents($this->dest_file, $this->ip_array[$key].":".$this->port_array[$key]."\r\n", FILE_APPEND);
           
       }
        
       
       
    }
 
}
 
$inst = new ProxyBrokerSort();
 
$inst->get_file("proxies/liste");
 
$inst->get_time();
$inst->get_proxy_ip();
$inst->get_proxy_port();
$inst->save_to_file();
