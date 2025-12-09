<?php
class Person{
    public $name;
    public $age;

    public function setName($n){
        $this->name=$n;
        $this->age=20;
    }

    public function getName(){
        echo $this->name ."<br>";
        echo $this->age;
    }
}
$person=new Person();
$person->setName("Bibisha");
$person->getName();
$person->age=20;
?>