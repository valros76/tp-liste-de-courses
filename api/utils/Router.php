<?php
class Router
{
  private $listRoutes;

  public function __construct()
  {
    if (!file_exists("routes/routes.json")) {
      exit;
    }

    $stringRoutes = file_get_contents("routes/routes.json");
    $this->listRoutes = json_decode($stringRoutes);
  }

  public function findRoute($httpRequest, $basepath){
    $url = str_replace($basepath, "", $httpRequest->getUrl());
    $method = $httpRequest->getMethod();
    $routeFound = array_filter($this->listRoutes, function($route) use ($url, $method){
      return preg_match("#^{$route->path}$#", $url) && $route->method == $method;
    });
    $numberRoute = count($routeFound);
    if($numberRoute > 1){
      http_response_code(400);
      echo json_encode([
        "message" => "Routes multiples détectées.",
        "status" => 400
      ]);
      exit;
    }else if($numberRoute == 0){
      http_response_code(400);
      echo json_encode([
        "message" => "Aucune route disponible.",
        "status" => 400
      ]);
      exit;
    }else{
      return new Route(array_shift($routeFound));
    }
  }
}
