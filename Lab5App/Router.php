<?php

namespace Lab5App;

class Router
{
  protected $routes = [];

  public function get($route, $controller, $action)
  {
    $this->routes["GET"][$route] = ["controller" => $controller, "action" => $action];
  }
  public function post($route, $controller, $action)
  {
    $this->routes["POST"][$route] = ["controller" => $controller, "action" => $action];
  }

  /*
        Add a post() method with the same function signature and logic as the get() method
        above, but change the method name from GET to POST
    */





  public function dispatch()
  {
    // Get the path part of the URL
    $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    // Remove leading and trailing slashes
    $uri = trim($uri, '/');

    // Explode the URI into an array of segments
    $uriSegments = explode("/", $uri);

    // Get the last two segments of the URI
    $lastTwoSegments = array_slice($uriSegments, -2);

    // Construct the route key
    $routeKey = implode("/", $lastTwoSegments);

    // Retrieve the route from the routes array
    $route = $this->routes[$_SERVER["REQUEST_METHOD"]][$routeKey] ?? null;

    // If route not found, return 404 error
    if (!$route) {
      echo "404 Not Found";
      return;
    }

    // Execute the controller action
    $controllerName = $route["controller"];
    $action = $route["action"];
    $controller = new $controllerName();
    $controller->$action();
  }
}
