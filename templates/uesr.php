<?php 


use UeDw15\Carpooling\User;
use UeDw15\Carpooling\MyClassA;


$mycless = new MyClassA();

$user = new User();
$user->setBirth('05/05/1993');
$user->setEmail('nothing');
$user->setFirstname('abdo');
$user->setLastname('alhmidi');


echo $twig->render('index.html.twig',[
    'name' =>'my name',
    'firstName' => $user->getFirstname()
    
]);

