<?php
class CoursesController
{

  public function Add(...$courses)
  {
    $configManager = new Config();
    $coursesManager = new Courses(BDD::getInstance($configManager->getConfig()));

    if (!$coursesManager->add($courses)) {
      http_response_code(400);
      echo json_encode([
        "message" => "Une erreur s'est produite lors de l'ajout de la liste de courses.",
        "status" => 400
      ]);
      exit;
    }

    http_response_code(200);
    echo json_encode([
      "message" => "Liste de courses ajoutée.",
      "status" => 200
    ]);
    exit;
  }

  public function Update(...$courses)
  {
    $id = $courses["id"];
    $configManager = new Config();
    $coursesManager = new Courses(BDD::getInstance($configManager->getConfig()));

    if (!$coursesManager->update($courses)) {
      http_response_code(400);
      echo json_encode([
        "message" => "Une erreur s'est produite lors de la mise à jour de la liste de courses.",
        "status" => 400
      ]);
      exit;
    }

    http_response_code(200);
    echo json_encode([
      "message" => "Liste de courses mise à jour.",
      "status" => 200
    ]);
    exit;
  }

  public function UpdateList(...$courses)
  {
    $id = $courses["id"];
    $list = $courses["list"];
    $configManager = new Config();
    $coursesManager = new Courses(BDD::getInstance($configManager->getConfig()));

    if (!$coursesManager->updateList($id, $list)) {
      http_response_code(400);
      echo json_encode([
        "message" => "Une erreur s'est produite lors de la mise à jour de la colonne liste, dans la liste de courses.",
        "status" => 400
      ]);
      exit;
    }

    http_response_code(200);
    echo json_encode([
      "message" => "Liste de courses mise à jour.",
      "status" => 200
    ]);
    exit;
  }

  public function updateBudget(...$courses){
    $id = $courses["id"];
    $budget = $courses["budget"];
    $configManager = new Config();
    $coursesManager = new Courses(BDD::getInstance($configManager->getConfig()));

    if (!$coursesManager->updateBudget($id, $budget)) {
      http_response_code(400);
      echo json_encode([
        "message" => "Une erreur s'est produite lors de la mise à jour de la colonne liste, dans la liste de courses.",
        "status" => 400
      ]);
      exit;
    }

    http_response_code(200);
    echo json_encode([
      "message" => "Liste de courses mise à jour.",
      "status" => 200
    ]);
    exit;
  }

  public function Show(...$courses)
  {
    $id = $courses["id"];
    $configManager = new Config();
    $coursesManager = new Courses(BDD::getInstance($configManager->getConfig()));

    if (!$coursesManager->getById($id)) {
      http_response_code(400);
      echo json_encode([
        "message" => "Une erreur s'est produite lors de la récupération de la liste de courses.",
        "status" => 400
      ]);
      exit;
    }

    http_response_code(200);
    echo json_encode([
      "message" => "Liste de courses récupérée.",
      "status" => 200
    ]);
    exit;
  }

  public function List()
  {
    $configManager = new Config();
    $coursesManager = new Courses(BDD::getInstance($configManager->getConfig()));

    if (!$coursesManager->getAll()) {
      http_response_code(400);
      echo json_encode([
        "message" => "Une erreur s'est produite lors de la récupération des listes de courses.",
        "status" => 400
      ]);
      exit;
    }
    http_response_code(200);
    echo json_encode([
      "message" => "Listes de courses récupérées.",
      "status" => 200
    ]);
    exit;
  }

  public function Delete(...$courses)
  {
    $id = $courses["id"];
    $configManager = new Config();
    $coursesManager = new Courses(BDD::getInstance($configManager->getConfig()));

    if (!$coursesManager->deleteById($id)) {
      http_response_code(400);
      echo json_encode([
        "message" => "Une erreur s'est produite lors de la suppression de la liste de courses.",
        "status" => 400
      ]);
      exit;
    }

    http_response_code(200);
    echo json_encode([
      "message" => "Liste de courses supprimée.",
      "status" => 200
    ]);
    exit;
  }
}
