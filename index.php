<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php

include('vendor/autoload.php');


$baelle = array(
    new Marina\Ball\Ball('Spezialball',30, 'Kautschuk'),
    new Marina\Ball\Ball('Sonderball',70, 'Metall'),
    new Marina\Ball\Ball('Sonderball',80, 'Metall'),
    new Marina\Ball\Ball('Sonderball',10, 'Metall'),
    new Marina\Ball\Ball('Sonderball',40, 'Spezial'),
    new Marina\Ball\Ball('Sonderball',22, 'Plastik'),
    new Marina\Ball\Ball('Bester Ball',310, 'Gummi'));


?>
<script>
    function doAjax(){
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //letzte Aufgabe hier bearbeiten
                document.getElementById('ajaxinput').innerHTML=this.responseText;
                //alert(this.responseText);
            }
        };
        //mitgeben welches format und Material
        xhttp.open("GET", "ajax.php?format=html&material=Kautschuk", true);
        xhttp.send();
    }


</script>

<div class="jumbotron text-center">
    <h1>Choose your ball</h1>
    <p class="text-primary">To change material change the URL </p>
    <p>(This website is for professional programmers.)</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Column <mark>HTML/JSON</mark></h3>

<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 20.04.2018
 * Time: 14:55
 */
//Ball.php einbinden, damit man die Klasse verwenden kann



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
 *
 *
 * if (isset($_GET["format"]) and $_GET["format"] == "html" and $ball->getMaterial() == $_GET["material"]){
        echo $ball . "<br />";
    } else if (isset($_GET["format"]) and($_GET["format"] == "json") and $ball->getMaterial() == $_GET["material"]) {
        echo $ball ->toJSON(). "<br />";
    }




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


        </div>
        <div class="col-sm-4">
            <h3> Choose one of them </h3>
            <p> <--on the left you can sort out the type</p>
            <p>-----------------------------------------</p>
            <p>on the right you can see all the balls --></p>
        </div>
        <div class="col-sm-4">
            <h3>Column <mark>AJAX HTML</mark></h3>
            <?php

            if (isset($_GET["format"]) and $_GET["format"] == "html"){
                echo $baelle[0] . "<br />";
                echo $baelle[1] . "<br />";
                echo $baelle[2] . "<br />";
            } else if (isset($_GET["format"]) and($_GET["format"] == "json")) {
                echo $baelle[0]->toJSON() . "<br />";
                echo $baelle[1]->toJSON() . "<br />";
                echo $baelle[2]->toJSON() . "<br />";
            }

            ?>
            <button onclick="doAjax()" value="click">Load all of the balls</button>
            <p id="ajaxinput"></p>
        </div>
    </div>
</div>
</body>
</html>





