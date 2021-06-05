<?php


namespace app\controllers;

use app\models\Form;
use app\models\Main;

class MainController extends AppController
{
    public function indexAction(){

        $product = new Form();
        $allProduct =$product->findAll();

        $types = new Main;
        $category = $types->findAll();

        if(isset($_POST['delete']) && isset($_POST['checkbox']) && $_POST['checkbox'] != "")
        {
            $arrCheck= $_POST['checkbox'];
            $r = array_values($arrCheck);
            $stringValue = implode(", ", $r );
            $ones = $product->getDeleteId($stringValue);

            header("Location: /");
              die();
        }
        $this->setVars(['product'=>$allProduct, 'category'=>$category]);
    }



}