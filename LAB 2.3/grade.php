<?php
$students = array(
    "James D. McCawley" => array(
        "grade" => "A+",
        "id" => 271231
    ),
    "Buwei Yang Chao" => array(
        "grade" => "A",
        "id" => 818211
    )
);
echo "<h2>Students</h2>";
foreach ($students as $name => $info) {
    echo $name . "<br> - Grade: " . $info["grade"] . ", ID: " . $info["id"] . "<br>";
}
//the no of item in a store inventory//

$inventory = array(
    "Soap" => 40,
    "Shampoo" => 25,
    "Toothpaste" => 18,
    "Cookies" => 50
);
echo "<h2>Inventory</h2>";
foreach ($inventory as $item => $qty) {
    echo $item . ": " . $qty . "<br>";
}
//school lunches for week//
$lunches = array(
    "Monday" => array(
        "entree" => "Chicken Burger",
        "side"   => "Fries",
        "drink"  => "Milk",
        "cost"   => 5.50
    ),
    "Tuesday" => array(
        "entree" => "Pizza",
        "side"   => "Salad",
        "drink"  => "Juice",
        "cost"   => 6.00
    ),
    "Wednesday" => array(
        "entree" => "Pasta",
        "side"   => "Garlic Bread",
        "drink"  => "Water",
        "cost"   => 5.75
    )
);
echo "<h2>Lunches</h2>";
foreach ($lunches as $day => $meal) {
    echo $day . " - " . $meal["entree"] . " with " . $meal["side"] . ", Drink: " . $meal["drink"] . ", Cost: $" . $meal["cost"] . "<br>";
}

//family memebers//
$familyNames = array("Dad", "Mother", "Sister");
echo "<h2>Family Names</h2>";
echo implode(", ", $familyNames);

//Names, ages, and relationship of people in your family//
$family = array(
    array(
        "name" => "Kim Martin",
        "age" => 47,
        "relationship" => "Father"
    ),
    array(
        "name" => "Lee Chaeryoung",
        "age" => 42,
        "relationship" => "Mother"
    ),
    array(
        "name" => "Kim Jennie",
        "age" => 29,
        "relationship" => "Sister"
    )

);

echo "<h2>Family Details</h2>";
foreach ($family as $member) {
    echo $member["name"] . " (" . $member["relationship"] . "), Age: " . $member["age"] . "<br>";
}

?>

