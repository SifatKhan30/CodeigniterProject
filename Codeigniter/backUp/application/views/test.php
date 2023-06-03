<h1>Test </h1>
<h2>Date: <?php echo $date ?></h2>
<hr>
<?php
echo $name.'<br>';
echo $roll;
?>

<pre> 
    <?php 

    foreach($list as $l){
        echo "<li>".$l."</li>";
    }