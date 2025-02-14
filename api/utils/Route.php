<?php
class Route{

  private $path;
  private $controller;
  private $action;
  private $method;
  private $params;

  public function __construct($route){
    $this->path = $route->path;
    $this->controller = $route->controller;
    $this->action = $route->action;
    $this->method = $route->method;
    $this->params = $route->params;
  }

  public function getPath(){
    return $this->path;
  }

  public function getController(){
    return $this->controller;
  }

  public function getAction(){
    return $this->action;
  }

  public function getMethod(){
    return $this->method;
  }

  public function getParams(){
    return $this->params;
  }

  public function run($httpRequest, $config){
    $controller = null;
    $controllerName = "{$this->controller}Controller";
    if(class_exists($controllerName)){
      $controller = new $controllerName($httpRequest, $config);
      if(method_exists($controller, $this->action)){
        $controller->{$this->action}(...$httpRequest->getParams());
      }else{
        http_response_code(400);
        echo json_encode([
          "message" => "L'action ciblée n'existe pas dans le contrôleur.",
          "status" => 400
        ]);
        exit;
      }
    }else{
      http_response_code(400);
      echo json_encode([
        "message" => "La classe ciblée n'existe pas.",
        "status" => 400
      ]);
      exit;
    }
  }

}