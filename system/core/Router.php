<?php
namespace system\core;

class Router
{
    public static $routers = [];
    public static $route = [''];

    /** * @param $route [page/form] => Array([controller] => page[action] =>  )
     *
     * Router::add(['form/index'=>['controller'=>'form', 'action'=>'index']]);
     */
    public static function add($route)
    {
        foreach ($route as $key=>$value){
            self::$routers[$key] = $value;
        }
    }

    /**
     * метод проверяет совпадения маршрутов
     * @param $url - URL адресная строка
     * @return bool
     */
    public static function checkRoute($url)
    {
        $url = self::removeQueryString($url);
        foreach (self::$routers as $k=>$val)
        {
            if(preg_match("#$k#i", $url, $matches))
            {
                $route = $val;

                foreach ($matches as $key => $match){
                    if(is_string($key)){
                        $route[$key] = $match;
                    }
                }
                $route['controller'] = self::uSTR($route['controller']);
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }

                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**creates a path to the file
     * @param $path
     */
    public static function dispatch($path)
    {
        if(self::checkRoute($path))
        {
            $controller = '\app\controllers\\'. self::$route['prefix'] . self::$route['controller'].'Controller';

            if (class_exists($controller)){

                $obj = new $controller(self::$route);
                $action = self::lSrt(self::$route['action'] . 'Action');

                if(method_exists($obj, $action)){
                    $obj->$action();
                    $obj->getView();
                }else{
                    http_response_code(404);
                    include '404.php';
                }
            }else{
                http_response_code(404);
                include '404.php';
            }
        }else{
            http_response_code(404);
            include '404.html';
        }
    }

    /** PageIndex
     * @param $str
     * @return string|string[]
     */
    private static function uSTR($str){
        $str = str_replace('-', ' ', $str);
        $str = ucwords($str);
        $str = str_replace(' ', '', $str);

        return $str;
    }

    /**
     * @param $str  $route['action']
     * @return string возвращает (название метода) с маленькой буквы pageIndex
     * we return the name of the method with a small letter
     */
    private static function  lSrt($str){

        return lcfirst(self::uSTR($str));
    }

    /** delete GET parameters
     * @param $url
     * @return mixed|string
     */
    private static function removeQueryString($url){
        if($url != ''){
            $params = explode('&', $url);
            if(strpos($params[0], '=') ===false){
                return  $params[0];
            }else{
                return '';
            }
        }
        return $url;
    }

}