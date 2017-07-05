<?php 
	$from   = 'USD'; 
    $to     = 'MXN';
    $url = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
    $handle = fopen($url, 'r');
 
    if ($handle) {
        $result = fgets($handle, 4096);
        fclose($handle);
    }
 
    $allData = explode(',',$result); 
    $currencyValue = $allData[1];
    $currencyValue = $currencyValue * 1.05;
    $currencyValue = round($currencyValue, 2, PHP_ROUND_HALF_UP);

    echo $currencyValue;

 ?>