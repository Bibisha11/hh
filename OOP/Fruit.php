<?php
    class fruit{
        public $name;
        protected $color;
        private $weight;

        public function setName($n){
            $this->name=$n;
        }
        protected function setColor($c){
            $this->color=$c;
        }
        public function getName(){
            echo $this->name;
        }
        private function setWEight($w){
            $this->weight=$w;
        }

        public function showfruit(){
            echo"Name: ".$this->name."<br>";
            echo"Color: ".$this->color;
            //echo"Weight: ".$this->weight;
        }
    }

        class Mango extends fruit{
            public function setMangoColor($c){
                //can access protected class property//
                $this->color=$c;
            }
        }
        $mango=new Mango();
        $mango->setName("Mango");
        $mango->setMangoColor("Green");
        $mango->showfruit();
    echo"<br>";
    $parent1= new fruit();
    $parent1->setName("Apple");
    echo $parent1->showfruit();


    //cannot access protected property from outside the class//
    // $parent1->color="Red";
    // echo $parent1->color;
?>