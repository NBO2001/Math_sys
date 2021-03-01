<?php

use Control\Controlmain;

$this->get("/home", function(){
    (new \Control\Controlmain)->indexPage();
});
$this->get("/questoes", function(){
    echo "Estamos na about teset";
});
$this->get("/formulario", function(){
    (new \Control\Controlmain)->formQ();
});
$this->post('/questoes', function(){
    (new \Control\Controlmain)->formGenerete();
});


