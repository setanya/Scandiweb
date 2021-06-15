<?php


namespace system\core;


abstract class Controller
{
    protected $route;
    protected $layout;
    protected  $view;
    public $vars =[];

    public function __construct($route, $view = '')
    {
        $this->route = $route;
        $this->view = $view ?: $route['action'];
    }

    /**
     * connecting the desired object
     */
    public function getView()
    {
     $objView = new View($this->route, $this->layout, $this->view);
     $objView->render($this->vars);//

    }

    /**
     * @param $vars
     * array to represent in the Views
     */
    public function setVars($vars){
        $this->vars = $vars;
    }


}