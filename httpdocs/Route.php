<?php
    /**
     * Route Class Definition
     */

    use controllers;

    class Route {
        /**
         * @var bool Once a matching route is found, stop check any additional ones.
         */
        private static $routeFound = FALSE;

        public static function resource($route) {
            if (!self::$routeFound) {
                $route = trim($route, '/');
                /*Grab the request uri */
                $uri = trim($_SERVER["REQUEST_URI"], '/');
                $uriParts = explode('/', $uri);
                /*We know the route parts of the url are at even indexes and params are at odd.
                Split them into the path and the params.
                */
                $path = [];
                $params = [];
                foreach ($uriParts as $k => $v) {
                    if ($k % 2 == 0) {
                        $path[] = $v;
                    } else {
                        $params[] = $v;
                    }
                }
                $pathRoute = implode('.', $path);
                if ($pathRoute == $route) {
                    self::$routeFound = TRUE;
                    /* Split the route definition on . to get the individual parts.*/
                    $routeParts = explode('.', $route);
                    /*Following assumes controller class are capitalized camel case and end with Controller  */
                    $routeParts = array_map('ucfirst', $routeParts);
                    $routeParts[] = 'Controller';
                    $controllerName = implode('', $routeParts);
                    /**
                     * @var $controller controllers\ICRUDController
                     */
                    $c = "controllers\\$controllerName";
                    $controller = new $c;
                    $controller->execute($params);
                }
            }
        }
    }