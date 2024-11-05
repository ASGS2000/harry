<?php
// PHP Control Statements Demonstration

// Conditional Statements
$score = 75;

// Using if...else
if ($score >= 90) {
    echo "Grade: A<br>";
} elseif ($score >= 80) {
    echo "Grade: B<br>";
} elseif ($score >= 70) {
    echo "Grade: C<br>";
} else {
    echo "Grade: D<br>";
}

// Using switch
$day = 3; // Let's say 1=Monday, 2=Tuesday, ..., 7=Sunday

switch ($day) {
    case 1:
        echo "Monday<br>";
        break;
    case 2:
        echo "Tuesday<br>";
        break;
    case 3:
        echo "Wednesday<br>";
        break;
    case 4:
        echo "Thursday<br>";
        break;
    case 5:
        echo "Friday<br>";
        break;
    case 6:
        echo "Saturday<br>";
        break;
    case 7:
        echo "Sunday<br>";
        break;
    default:
        echo "Invalid day<br>";
}

// Looping Statements
echo "Counting from 1 to 5 using for loop:<br>";
for ($i = 1; $i <= 5; $i++) {
    echo $i . "<br>";
}

echo "Counting from 1 to 5 using while loop:<br>";
$count = 1;
while ($count <= 5) {
    echo $count . "<br>";
    $count++;
}

echo "Array iteration using foreach loop:<br>";
$colors = ["Red", "Green", "Blue", "Yellow"];
foreach ($colors as $color) {
    echo $color . "<br>";
}
?>