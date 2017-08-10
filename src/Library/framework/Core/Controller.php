<?php

namespace Framework\Core;

class Controller {
     
    protected $model;
    protected $view;
     
    public function __construct(Model $model) {
        $this->view = new View();
        $this->model = $model;   
    } 
}