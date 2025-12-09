<?php
class Book1 {
    public $title;
    public $price;

    // Proper constructor
    public function __construct($a, $b) {
        echo "I am constructor<br>";
        $this->title = $a;
        $this->price = $b;
    }

    // Method to display price
    public function getPrice() {
        echo "Price is: " . $this->price;
    }

    // Destructor
    public function __destruct() {
        echo "<br>End.";
    }
}

// Create object
$chemistry = new Book1("Chemistry", 500);
$chemistry->getPrice();
?>
?>