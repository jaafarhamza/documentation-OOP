<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

class form{
    public $num;
    public $name;

    function forme(){
        $numm =$this -> num;
        $naame =$this -> name;
        echo "the number is $numm and the name is $naame";
    }
}

if(isset($_POST['submit'])){
    $tap = new form();
    $tap -> num = 1;
    $tap -> name = 'hamza';
    $tap -> forme();
}

?>


    <form method="POST" >
        <input type="submit" value="SEND" name="submit">
    </form>

    




</body>
</html>


