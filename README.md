# ProxyBrokerSort

Here a little PHP Script to Sort Results from the Python App „ProxyBroker“ by Speed

# Example


include 'ProxyBrokerSort.php';

$inst = new ProxyBrokerSort();

$inst->get_file("proxies/liste");

$inst->get_time();

$inst->get_proxy_ip();

$inst->get_proxy_port();

$inst->save_to_file();
