<?php

namespace Framework\Core;

class View
{

    public function __construct()
    {}

    public function render($name, $data = FALSE) 
    {
        if ($data != FALSE) {
             extract($data);
        }
        require(BASE_PATH .DS. "Views" .DS. $name . ".php");
    }
}
