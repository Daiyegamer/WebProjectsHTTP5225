<!doctype html>
<html>
    <head>
        <title>PHP If Statements</title> 
    </head>
    <body>

        <h1>PHP If Statements</h1> 

        <p>Use PHP echo and variables to output the following link information, use if statements to make sure everything outputs correctly:</p>

        <?php

        // **************************************************
        // Do not edit this code

        // Generate a random number (1, 2, or 3)
        $randomNumber = ceil(rand(1,3));

        // Display the random number
        echo '<p>The random number is '.$randomNumber.'.</p>';

        // Based on the random number PHP will define four variables and fill them with information about Codecademy, W3Schools, or MDN
        
        // The random number is 1, so use Codecademy
        if ($randomNumber == 1)
        {

            $linkName = 'Codecademy';
            $linkURL = 'https://www.codecademy.com/';
            $linkImage = '';
            $linkDescription = 'Learn to code interactively, for free.';

        }

        // The random number is 2, so use W3Schools
        elseif ($randomNumber == 2)
        {

            $linkName = '';
            $linkURL = 'https://www.w3schools.com/';
            $linkImage = 'w3schools.png';
            $linkDescription = 'W3Schools is optimized for learning, testing, and training.';

        }

        // The random number is 3, so use MDN
        else
        {

            $linkName = 'Mozilla Developer Network';
            $linkURL = 'https://www.codecademy.com/';
            $linkImage = 'mozilla.png';
            $linkDescription = 'The Mozilla Developer Network (MDN) provides information about Open Web technologies.';

        }

        // **************************************************

        // Beginning of the exercise, place all of your PHP code here
        // Upload this page (or use your localhost) and refresh the page, the h2 below will change
        

        if ($linkName == ''){
            echo '<h2>'.$linkURL.'</h2>';
            echo '<a href = "'.$linkURL.'">' . $linkURL . '</a>';
            echo '<img src="'. $linkImage.'">';
        }
        else if ($linkImage == ''){
            echo '<h2>'.$linkName.'</h2>';
            echo '<a href = "'.$linkURL.'">' . $linkName . '</a>';
            echo '';
        }
        else echo  '<h2>'.$linkName.'</h2>';
             echo '<a href = "'.$linkURL.'">' . $linkName . '</a>';
             echo '<img src="'. $linkImage.'">';


        

        ?>
        <hr>
        

        <?php

        $breakfast="Bananas, Apples, and Oats";
        $lunch="Fish, Chicken, and Vegetables";
        $dinner="Fish, Chicken, and Vegetables";
        $hour = ceil(rand(1,24));

        if ($hour >5 && $hour<9 ){
            echo 'feed animals ' . $breakfast ;
        }

        else if ($hour >12 && $hour<14 ){
            echo 'feed animals ' . $lunch ;
        }
        else if ($hour >19 && $hour<21 ){
            echo 'feed animals ' . $dinner ;
        }
         else echo 'It is not time to feed the animals yet.'
        ?>

        <hr>
        <?php

        $magicNumber=ceil(rand(1,100));
        if ($magicNumber%3==0 && $magicNumber%5==0){
        echo 'magic number is ' . 'FizzBuzz' ;
        }
         else if ($magicNumber%3==0 && $magicNumber%5!=0){
         echo 'magic number is ' . 'Fizz';
         }
         else if ($magicNumber%3!=0 && $magicNumber%5!=0){         
         echo 'magic number is ' . $magicNumber ;}
         0
         else {echo ' magic number is '. 'Buzz';}
