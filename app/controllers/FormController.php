<?php


namespace app\controllers;

use app\models\Form;
use app\models\Main;

class FormController extends AppController
{
    public function indexAction(){
        $types = new Main;
        $category = $types->findAll();
        $product = new Form();
        $allProduct =$product->findAll();

        if(isset($_POST['submit']))
        {
            $sku = $_POST['sku'];
            $name = $_POST['name'];
            $price = $_POST['cost'];
            $type = $_POST['type'];
            $size = $_POST['size'];
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $width = $_POST['width'];
            $length = $_POST['length'];

            if((isset($_POST['sku']) && $_POST['sku'] !='') && (isset($_POST['name']) && $_POST['name'] !="") && (isset($_POST['cost']) && $_POST['cost'] !='')){

                if($_POST['type'] ==1 && $_POST['size'] !='')
                {
                    $dvd = $product->addDvd($sku, $name, $price, $type, $size);
                    header("Location: /");
                    die();
                }
                if($_POST['type'] ==2 && $_POST['weight'] !='')
                {
                    $book = $product->addBook($sku, $name, $price, $type, $weight);
                    header("Location: /");
                    die();
                }
                if($_POST['type'] ==3 && $_POST['height'] !='' && $_POST['width'] !='' && $_POST['length'] !='')
                {
                    $furniture = $product->addFurniture($sku, $name, $price, $type, $height, $width, $length);
                    header("Location: /");
                    die();

                }
            }
       }

        $this->setVars(['product'=>$allProduct, 'category'=>$category]);
    }

}