<?php
class Book{
    //member variable//
    public $price;
    public $title;

    //member function//
    public function setPrice($par){
        $this->price = $par;
        $this->title = "Titanic";
    }
    public function getPrice(){
        echo $this->price."<br>";
        echo $this->title;
    }
}
    $book1= new Book();
    $book1->setPrice(100);
    $book1->getPrice();
    $book1->title="Titanic";

?>