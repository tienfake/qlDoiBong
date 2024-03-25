<?php
namespace App\controllers;
class IndexController extends BaseController{
    function indexAdmin(){
        include 'app/views/layout/menu.php';
        return $this->render('index.index');
    }
}
?>