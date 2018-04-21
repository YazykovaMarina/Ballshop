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
        return $this ->name . ' ' . $this ->durchmesser . 'cm ' . $this -> material . ' hat Volumen: '. $this->calcVolume();
    }

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

}