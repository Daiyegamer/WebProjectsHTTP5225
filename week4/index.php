<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// Function to fetch user data from the JSONPlaceholder API
function getUsers() {
$url = "https://jsonplaceholder.typicode.com/users";
$data = file_get_contents($url);
return json_decode($data, true);
}

// Get the list of users
$users = getUsers();

if (count($users) > 0)
  {
     for($x = 0; $x <= count($users); $x++){
        echo $users[$x]["name"];
        echo "<br>";
        echo $users[$x]["username"];
        echo "<br>";
        echo '<a href="mail to:'.$users[$x]["email"].'">Email me Here</a>';
          
        echo "<br>";
        echo $users[$x]["address"]["street"];
        echo "<br>";
        echo $users[$x]["address"]["suite"];
        echo "<br>";
        echo $users[$x]["address"]["city"];
        echo "<br>";
        echo $users[$x]["address"]["zipcode"];
        echo "<br>";
        echo  "<br>";
        echo "<br>";

     }
  }


?>


    
</body>
</html>