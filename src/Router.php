<?php
namespace Foxwind;

//use App\Controllers\UserController;
/** Class Router **/

class Router {

    private $url;
    private $routes = [];

    public function __construct($url){
        if (strpos($url,"?")!==false) {
            $url = substr($url,0,strpos($url,"?"));
        }
        $this->url = $url;
    }

    public function getRoute()
    {
        return $this->routes;
    }

    public function get($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes["GET"][] = $route;
        return $route;
    }

    public function post($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes["POST"][] = $route;
        return $route;
    }

    public function run() {

        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new \Exception('REQUEST_METHOD does not exist');
        }
        //boucle pour vérfier POST ou GET
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }
        // throw new \Exception('No matching routes');
        require VIEWS . '404.php';
    }

}
