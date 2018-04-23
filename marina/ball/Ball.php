<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 20.04.2018
 * Time: 14:44
 */
namespace Marina\Ball;

class Ball {
    //es gibt private, public, protected
    private $name;
    private $durchmesser;
    private $material;

    public function __construct($name, $durchmesser, $material)
    {
        $this ->durchmesser = $durchmesser;
        $this ->material = $material;
        $this ->name = $name;
    }
    public function calcVolume(){
        return round(4/3 * M_PI * pow(($this ->durchmesser/2),3),2);
    }

    public function __toString()
    {
        return $this ->name . ' - ' . $this ->durchmesser . 'cm - ' . $this -> material . ' - volume: '. $this->calcVolume();
    }
    /* ginge auch mit EOT
     * function __toString(): string
    {
        $rv = <<<EOT
        Name: $this->name <br>
        Price: $this->price <br>
        Width: $this->width <br>
        Height: $this->height <br>
        Color: <div style="background-color:$this->color; width:50px; height: 50px;"></div><br>
        Language Code: $this->langcode
EOT;
        return $rv;
    }
     */

    public function toJSON(){
        $json = array(
            "name" => $this->name,
            "durchmesser" => $this->durchmesser,
            "material" => $this->material,
            "volumen" => $this->calcVolume()
        );
        //wandelt das Array ins JSON Format
        return json_encode($json);
    }

    public function getMaterial(){
        return $this->material;
    }
    public function getName(){
        return $this->name;
    }
    public function getDurchmesser(){
        return $this->durchmesser;
    }

}