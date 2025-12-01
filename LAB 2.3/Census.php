<?php

$cities = array(
    array("city" => "New York", "state" => "NY", "population" => 8008278),
    array("city" => "Los Angeles", "state" => "CA", "population" => 3694820),
    array("city" => "Chicago", "state" => "IL", "population" => 2896016),
    array("city" => "Houston", "state" => "TX", "population" => 1953631),
    array("city" => "Philadelphia", "state" => "PA", "population" => 1517550),
    array("city" => "Phoenix", "state" => "AZ", "population" => 1321045),
    array("city" => "San Diego", "state" => "CA", "population" => 1223400),
    array("city" => "Dallas", "state" => "TX", "population" => 1188580),
    array("city" => "Detroit", "state" => "MI", "population" => 951270),
    array("city" => "San Antonio", "state" => "TX", "population" => 1144646)
);

echo "<h3>Part I: City Population Table</h3>";

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>City</th><th>State</th><th>Population</th></tr>";

$total = 0;

foreach ($cities as $c) {
    echo "<tr>";
    echo "<td>" . $c["city"] . "</td>";
    echo "<td>" . $c["state"] . "</td>";
    echo "<td>" . number_format($c["population"]) . "</td>";
    echo "</tr>";

    $total += $c["population"];
}

echo "<tr><th colspan='2'>Total Population</th>";
echo "<th>" . number_format($total) . "</th></tr>";
echo "</table><br>";



echo "<h3>Part II: Sorted by Population (Largest → Smallest)</h3>";

usort($cities, function($a, $b) {
    return $b['population'] - $a['population'];
});

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>City</th><th>State</th><th>Population</th></tr>";

foreach ($cities as $c) {
    echo "<tr>";
    echo "<td>" . $c["city"] . "</td>";
    echo "<td>" . $c["state"] . "</td>";
    echo "<td>" . number_format($c["population"]) . "</td>";
    echo "</tr>";
}
echo "</table><br>";


echo "<h3>Part II: Sorted by City Name (A → Z)</h3>";

usort($cities, function($a, $b) {
    return strcmp($a['city'], $b['city']);
});

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>City</th><th>State</th><th>Population</th></tr>";

foreach ($cities as $c) {
    echo "<tr>";
    echo "<td>" . $c["city"] . "</td>";
    echo "<td>" . $c["state"] . "</td>";
    echo "<td>" . number_format($c["population"]) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
