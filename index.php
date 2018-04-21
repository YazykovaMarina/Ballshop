<html>
<body>

<script>
    function doAjax(){
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //letzte Aufgabe hier bearbeiten
                alert(this.responseText);
            }
        };
        xhttp.open("GET", "ajax.php", true);
        xhttp.send();
    }


</script>

<button onclick="doAjax()" value="click"></button>

<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 20.04.2018
 * Time: 14:55
 */
//Ball.php einbinden, damit man die Klasse verwenden kann

include('vendor/autoload.php');



$baelle = array(
 new Marina\Ball\Ball('Spezialball',30, 'Kautschuk'),
new Marina\Ball\Ball('Sonderball',70, 'Metall'),
new Marina\Ball\Ball('Bester Ball',310, 'Gummi'));



foreach ($baelle as $ball){
    // in der Adresszeile hinten dran anhängen -->   ?format=html
    // Get Parameter mit dem Value html oder JSON
    //zusätlich kontrollieren wir ob das Material des Balls dem Get Parameter "material" entspricht
    //http://localhost/2018_Ball/index.php?format=html&material=Kautschuk
    if (isset($_GET["format"]) and $_GET["format"] == "html" and $ball->getMaterial() == $_GET["material"]){
        echo $ball . "<br />";
    } else if (isset($_GET["format"]) and($_GET["format"] == "json") and $ball->getMaterial() == $_GET["material"]) {
        echo $ball ->toJSON(). "<br />";
    }
}
//ohne Materialparameter
/*
if (isset($_GET["format"]) and $_GET["format"] == "html"){
    echo $b1 . "<br />";
    echo $b2. "<br />";
    echo $b3 . "<br />";
} else if (isset($_GET["format"]) and($_GET["format"] == "json")){
    echo $b1 ->toJSON(). "<br />";
    echo $b2 ->toJSON(). "<br />";
    echo $b3 ->toJSON(). "<br />";
}*/

?>
</body>
</html>





