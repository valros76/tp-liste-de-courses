<?php
class HttpRequest
{
  private $url;
  private $method;
  private $params;
  private $route;

  public function __construct($url = null, $method = null)
  {
    $this->url = !$url ? $_SERVER["REQUEST_URI"] : $url;
    $this->method = !$method ? $_SERVER["REQUEST_METHOD"] : $method;
    $this->params = [];
  }

  public function getUrl()
  {
    return $this->url;
  }

  public function getMethod()
  {
    return $this->method;
  }

  public function getParams()
  {
    return $this->params;
  }

  public function addParam($param)
  {
    $this->params[] = $param;
  }

  public function getRoute()
  {
    return $this->route;
  }

  public function setRoute($route)
  {
    $this->route = $route;
  }

  public function bindParam()
  {
    switch ($this->method) {
      case "GET":
        foreach($this->route->getParams() as $param){
          if(isset($_GET["param"])){
            $this->addParam($_GET["param"]);
          }
        }
        break;
      case "POST":
      case "PUT":
      case "DELETE":
      default:
        $jsonInput = file_get_contents("php://input");
        $postData = json_decode($jsonInput, true);
        if($postData){
          $this->params = $postData;
        }
        break;
    }
  }

  public function run($config){
    $this->bindParam();
    $this->route->run($this, $config);
  }
}
