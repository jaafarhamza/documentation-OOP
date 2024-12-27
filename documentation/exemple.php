<?php
class name {
    public $color = "red";
}
$ex = new name();
// echo $ex -> color;

class exemple {
    function hi(){
       echo "hi";
    }
}

$hii = new exemple();
// echo $hii -> hi();


class contructeur {
    public $name;
    public $age;

    public function __construct($name){
        $this -> name = $name;
    }
    public function name(){
        return $this -> name;
    }
}

$apple = new contructeur("applee");
// echo $apple ->name();


class destructeur {
    public $name;
    public $age;

    public function __construct($name){
        $this -> name = $name;
    }

    public function __destruct(){
        // echo "the name is {$this -> name}";
    }
}

$name = new destructeur("hamza");


class extends1 {
    function father(){
        echo 'father  ';
    }
}

class extends2 extends extends1 {
    function son(){
        echo 'son  ';
    }
}

// $fa = new extends1();
// $fa -> father();
// $so = new extends2();
// $so -> son();
// $so -> father();


// construt2

class student{
    function __construct($name,$age){
        echo $name . " " .$age;
    }
}
// $tap=new student("hammza",2222);

// const and static

class conste{
    const name = 'hamza';
    public static $age =545;
}
// $tapy = new conste();
// echo conste::name;
// echo conste::$age;

// Exemple 1 : Modifications des Propriétés

class modifie{
    public $montant;

    public function __construct($montant){
        $this ->montant =+ $montant;
    }

    function depot($depot){
        $this -> montant += $depot;
    }

    function affiche(){
        return "solde :" . $this->montant;
    }
}

$depot= new modifie(522);
$depot -> depot(1000);
echo $depot->affiche();



//abstract class












