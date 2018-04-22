<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 20.04.2018
 * Time: 16:34
 */
include('vendor/autoload.php');

$baelle = array(
    new Marina\Ball\Ball('Spezialball',30, 'Kautschuk'),
    new Marina\Ball\Ball('Sonderball',70, 'Metall'),
    new Marina\Ball\Ball('Sonderball',80, 'Metall'),
    new Marina\Ball\Ball('Sonderball',10, 'Metall'),
    new Marina\Ball\Ball('Sonderball',40, 'Spezial'),
    new Marina\Ball\Ball('Sonderball',22, 'Plastik'),
    new Marina\Ball\Ball('Bester Ball',310, 'Gummi'));
echo "</br>";
echo $baelle[3]."</br>";
echo $baelle[4]."</br>";
echo $baelle[5]."</br>";
echo $baelle[6]."</br>";


?>
