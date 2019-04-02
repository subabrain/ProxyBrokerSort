# ProxyBrokerSort

A Sort Class for ProxyBroker Results by Speed

# Example

<?php

include 'ProxyBrokerSort.php';


$inst = new ProxyBrokerSort();

$inst->get_file("proxies/liste");

$inst->get_time();

$inst->get_proxy_ip();

$inst->get_proxy_port();

$inst->save_to_file();
