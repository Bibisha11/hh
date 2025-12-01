<?php
$people=array(
    array(
        "name"=>"Martin",
        "age"=>18,
    ),
    array(
        "name"=>"James",
        "age"=>19
    ),
    array(
        "name"=>"Joong",
        "age"=>22
    ),
    array(
        "name"=>"Dunk",
        "age"=>20
    ),
    array(
        "name"=>"Aou",
        "age"=>23,
    )
    );
echo "<h3>Using For Loop</h3>";

for ($i = 0; $i < count($people); $i++) {
    echo "Name: " . $people[$i]["name"] . " | Age: " . $people[$i]["age"] . "<br>";
}

echo "<h3>Using Foreach Loop</h3>";
foreach ($people as $person) {
    echo "Name: " . $person["name"] . " | Age: " . $person["age"] . "<br>";
}    
    ?>