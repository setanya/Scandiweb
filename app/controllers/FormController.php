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
            if((isset($_POST['sku']) && $_POST['sku'] !='') && (isset($_POST['name']) && $_POST['name'] !="") && (isset($_POST['cost']) && $_POST['cost'] !='')){

                $sku = $_POST['sku'];
                $name = $_POST['name'];
                $price = $_POST['cost'];
                $type = $_POST['type'];
                $size = $_POST['size'];
                $weight = $_POST['weight'];
                $height = $_POST['height'];
                $width = $_POST['width'];
                $length = $_POST['length'];

                if($_POST['type'] != "" && ($_POST['weight'] != "" || $_POST['size']!= "" || $_POST['height'] != "" || $_POST['width'] != "" || $_POST['length']))
                {
                    $addProduct = $product->addProduct($sku, $name, $price, $type, $size, $weight, $height, $width, $length);
                    header("Location: /");
                    die();
                }
            }
       }

        $this->setVars(['product'=>$allProduct, 'category'=>$category]);
    }

}