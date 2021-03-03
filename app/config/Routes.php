<?php

use Control\Controlmain;

$this->get("/home", "PagesController@indexPage");
$this->get("home/formulario", "PagesController@formQ");
$this->get("/formulario", "PagesController@formQ");
$this->post('/questoes',"Controlmain@formGenerete");


