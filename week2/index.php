<!doctype html>
<html>
  <head>
    
    <title>PHP and Creating Output</title>
    
  </head>
  <body>
   
  
   <?php echo "<PHP and Creating Output</h1>";


       echo "<p>When creating output using echo and PHP,
        quotes can often cause problems. 
        There are several solutions to using quotes within an echo statement:</p>";
   ?>
  
    <p>The PHP echo command can be used to create output.</p>
    
    
    <ul>
        <li>Use HTML special characters</li>
        <li>Alternate between single and double quotes</li>
        <li>Use a backslash to escape quotes</li>
    </ul>
    
    <h2>More HTML to Convert</h2>

    <p>PHP says "Hello World!"</p>

    <p>Can you display a sentence with ' and "?</p>

    <img src="php-logo.png">
    <?php
        echo '<img src = "https://google.com/image">';
    ?>
    <img src = "<?php echo 'https://google.com/image' ?>" alt="<?php echo 'ALT TAG'; ?>">

    <?php
     $name = "Gary Bhanot";
     $lastName= 'Bhanot';
     echo "Hello,".$name;

     
     $person['first'] = 'Gary';
     $person['last'] = 'Bhanot';
     $person['email'] = 'info@pixelr.io';
     $person['web'] =  'https://pixelr.io';

     echo 'Hello,' . $person['first'];

     

     
     ?>
<a href = "mailto: <?php echo $person['email'] ?>"> EMAIL me here</a><br><br><br>
<a href = <?php echo $person['web'] ?>>my link </a>


  </body>
</html>