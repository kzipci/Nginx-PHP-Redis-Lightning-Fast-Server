<?php
require_once '/var/www/html/vendor/predis/predis/autoload.php';
$redis = new Predis\Client(array('host' => 'redis', "port" => 6379, "password" => "supersecretpass"));

$redis->incr('sayac');
echo $redis->get('sayac');
?>
<br>
<?php

$redis->set('setter', "Veri yazdık");
echo $redis->get('setter');
?>
<br>
<?php
$redis->set('setter', "Aynı değişkenin üzerine başka bilgi yazdık");
echo $redis->get('setter');
?>
<br>
<?php
$redis->del('sayac', 'setter');
echo $redis->get('sayac');
echo $redis->get('setter');
echo "Redis'e yazdığımız değişkenleri sildik.";
?>
<br>
<?php
$redis->set('setter', "Veri1");
$redis->set('setter2', "Veri2");
echo $redis->get('setter');
echo $redis->get('setter2');
$redis->flushAll();
?>
<br>
<?php
echo $redis->get('setter');
echo $redis->get('setter2');
echo "Tüm verileri sildik";
?>
<br>
<?php
$redis->setex('setex', 1, "Süreli değişken"); #Test etmek için; 1 defa sayfayı yeniden yükleyin, sonra bu satırın başına hashtag ekleyin, php dosyasını kaydedin ve sayfayı yeniden yükleyin. 
echo $redis->get('setex');