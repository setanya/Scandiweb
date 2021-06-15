<?php


namespace system\core;


class View
{
   public $route = [];
   public $layout;
    public $view;

    public function __construct($route, $layout ="",$view = "")
    {
        $this->route = $route;
        if($layout === false){
            $this->layout = false;
        }else{
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;//
    }

    /** way to View
     * @param $vars
     */
    public function render($vars)
    {
        extract($vars);
        ob_start();

      $path_view = ROOT . '/app/views/' . $this->route['prefix'] . $this->route['controller']. '/'. $this->view .'.php';

      if(file_exists($path_view)){
          require $path_view;
      }else{
          echo 'View '. $path_view. '  not found';
      }
       $content = ob_get_clean();
        if( $this->layout !==false)
        {
          $path_layout = ROOT . '/app/views/layouts/' . $this->layout.'.php';
            if(is_file($path_layout))
            {
                require  $path_layout;
            }else{
                echo 'Pattern  '.$this->layout.'  not found';
            }
        }else{
            echo $content;
        }
    }





}