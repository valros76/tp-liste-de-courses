<?php
class HomeController{
  public function Index(){
    http_response_code(200);
    echo json_encode([
      "message" => "Bienvenue sur Food App.",
      "status" => 200
    ]);
    exit;
  }
}