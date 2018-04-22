<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 22.04.2018
 * Time: 23:28
 */
echo "echo echo echo echo";

include('vendor/autoload.php');

$baelle = array(
    new Marina\Ball\Ball('Spezialball',30, 'Kautschuk'),
    new Marina\Ball\Ball('Sonderball',70, 'Metall'),
    new Marina\Ball\Ball('Sonderball',80, 'Metall'),
    new Marina\Ball\Ball('Sonderball',10, 'Metall'),
    new Marina\Ball\Ball('Sonderball',40, 'Spezial'),
    new Marina\Ball\Ball('Sonderball',22, 'Plastik'),
    new Marina\Ball\Ball('Bester Ball',310, 'Gummi'));

// Initializing the View: rendering in Fluid takes place through a View instance
// which contains a RenderingContext that in turn contains things like definitions
// of template paths, instances of variable containers and similar.
$view = new \TYPO3Fluid\Fluid\View\TemplateView();

// TemplatePaths object: a subclass can be used if custom resolving is wanted.
$paths = $view->getTemplatePaths();

// Assigning the template path and filename to be rendered. Doing this overrides
// resolving normally done by the TemplatePaths and directly renders this file.
$paths->setTemplatePathAndFilename(_DIR_ . '/templates/ballfluid.html');

// In this example we assign all our variables in one array. Alternative is
// to repeatedly call $view->assign('name', 'value').
$view->assignMultiple(
    array (
        "Ball1" => $baelle[0],
        "Ball2" => $baelle[1],
        "Ball3" => $baelle[2],
        "Ball4" => $baelle[3],
        "Ball5" => $baelle[4],
        "Ball6" => $baelle[5],
        "Ball7" => $baelle[6]
    )
);

// Rendering the View: plain old rendering of single file, no bells and whistles.
$output = $view->render();

echo $output;