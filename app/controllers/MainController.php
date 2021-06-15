<?php


namespace app\controllers;

use app\models\Form;

class MainController extends AppController
{
    public function indexAction(){

        $product = new Form();

        $dvd = $product ->getDvdId("Size");
        $book = $product->getBookId("Weight");
        $furniture = $product->getFurnitureId("Dimension");
        $arrItem = array_merge($dvd , $book, $furniture);

        usort($arrItem, function ($a, $b){ return $a["id"] - $b["id"]; });

        if(isset($_POST['delete']) && isset($_POST['checkbox']) && $_POST['checkbox'] != "")
        {
            $arrCheck= $_POST['checkbox'];
            $r = array_values($arrCheck);
            $stringValue = implode(", ", $r );
            $ones = $product->getDeleteId($stringValue);

            header("Location: /");
              die();
        }
        $this->setVars(['arrProduct'=>$arrItem]);
    }



}