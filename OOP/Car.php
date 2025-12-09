<?php
class Car{
    public $brand;
    public $model;
    public $price;

    public function setPrice($p){
        $this->price=$p;
        $this->brand="Toyota";
        $this->model="Corolla";
    }

    public function getPrice(){
        echo $this->price."<br>";
        echo $this->brand."<br>";
        echo $this->model;
}
    }
    $car=new Car();
    $car->setPrice(20000);
    $car->getPrice();
    $car->model="Corolla";
?>