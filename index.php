<?php

include "./vendor/autoload.php" ;
use TYPO3Fluid\Fluid;

$baelle = array(
    new Marina\Ball\Ball('Spezialball', 30, 'Kautschuk'),
    new Marina\Ball\Ball('Sonderball', 70, 'Metall'),
    new Marina\Ball\Ball('Sonderball', 80, 'Metall'),
    new Marina\Ball\Ball('Sonderball', 10, 'Metall'),
    new Marina\Ball\Ball('Sonderball', 40, 'Spezial'),
    new Marina\Ball\Ball('Sonderball', 22, 'Plastik'),
    new Marina\Ball\Ball('Bester Ball', 310, 'Gummi'));



/*
if (isset($_GET["format"]) and $_GET["format"] == "html") {
    echo $baelle[0] . "<br />";
    echo $baelle[1] . "<br />";
    echo $baelle[2] . "<br />";
} else if (isset($_GET["format"]) and ($_GET["format"] == "json")) {
    echo $baelle[0]->toJSON() . "<br />";
    echo $baelle[1]->toJSON() . "<br />";
    echo $baelle[2]->toJSON() . "<br />";
}
*/

// Initializing the View: rendering in Fluid takes place through a View instance
// which contains a RenderingContext that in turn contains things like definitions
// of template paths, instances of variable containers and similar.
$view = new \TYPO3Fluid\Fluid\View\TemplateView();

// TemplatePaths object: a subclass can be used if custom resolving is wanted.
$paths = $view->getTemplatePaths();

// Assigning the template path and filename to be rendered. Doing this overrides
// resolving normally done by the TemplatePaths and directly renders this file.
$paths->setTemplatePathAndFilename(__DIR__ . '/templates/ballfluid.html');

foreach ($baelle as $ball) {

    // in der Adresszeile hinten dran anhängen -->   ?format=html
    // Get Parameter mit dem Value html oder JSON
    //zusätlich kontrollieren wir ob das Material des Balls dem Get Parameter "material" entspricht
    //http://localhost/2018_Ball/index.php?format=html&material=Kautschuk
    if (isset($_GET["format"]) and $_GET["format"] == "html" and $ball->getMaterial() == $_GET["material"]) {
        $view->assignMultiple(
            array(
                "Balln" => $ball->getName(),
                "Ballm" => $ball->getMaterial(),
                "Balld" => $ball->getDurchmesser(),
                "Ballv" => $ball->calcVolume()

            )
        );
        echo $ball->getName();
    } else if (isset($_GET["format"]) and ($_GET["format"] == "json") and $ball->getMaterial() == $_GET["material"]) {
        echo $ball->toJSON() . "<br />";
    }

}

$view->assignMultiple(
    array(
        "n" => $baelle[0]->getName()

    )
);

// Rendering the View: plain old rendering of single file, no bells and whistles.
$output = $view->render();

echo $output;
