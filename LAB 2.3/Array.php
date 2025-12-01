<?php
$people=array(
    array(
        "name"=>"Jennifer Kimber",
        "email"=>"abc@gmail.com",
        "city"=>"Seattle",
        "state"=>"Washington",
    ),
    array(
        "name"=>"Rodney Hitchers",
        "email"=>"def@gmail.com",
        "city"=>"Los Angeles",
        "state"=>"California",
    ),
    array(
        "name"=>"Robert Smith",
        "email"=>"ghi@gmail.com",
        "city"=>"Michigan",
        "state"=>"Missouri",
    )
    );
echo "<h3>Without Loop</h3>";
echo $people[0]["name"] . "<br>";
echo $people[0]["email"] . "<br>";
echo $people[0]["city"] . "<br>";
echo $people[0]["state"] . "<br><br>";

echo $people[0]["name"] . "<br>";
echo $people[0]["email"] . "<br>";
echo $people[0]["city"] . "<br>";
echo $people[0]["state"] . "<br><br>";

echo $people[0]["name"] . "<br>";
echo $people[0]["email"] . "<br>";
echo $people[0]["city"] . "<br>";
echo $people[0]["state"] . "<br><br>";

echo "<h3>Using Foreach Loop</h3>";

foreach ($people as $person) {
    foreach ($person as $item) {
        echo $item . "<br>";
    }
    echo "<br>";
}    
    ?>