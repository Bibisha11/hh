<?php
class Circle{
    public $radius;

    public function setRadius($r){
        $this->radius=$r;
    }

    public function getArea(){
        $area=3.14*($this->radius**2);
        echo "Area of circle:" .$area;
    }
}
$circle=new Circle();
$circle->setRadius(5);
$circle->getArea();

?>
