<?php
namespace App\controllers;
use eftec\bladeone\BladeOne;
class BaseController{
    function render($viewFile, $data = []){
        $views = "./app/views";
        $cache = "./app/cache";
        $blade = new BladeOne($views,$cache, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
    }

}
  
?>
