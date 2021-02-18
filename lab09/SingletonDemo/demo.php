<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 11/28/16
 * Time: 10:50 PM
 */

include __DIR__.'/Singleton.php';

//$s = new Singleton(); // you can't use new Singleton from outside the class since 
						// the default constructor is private

$s = Singleton::getInstance();
echo $s->getInfo()."<br>";


$x = Singleton::getInstance();
echo $x->getInfo()."<br>";