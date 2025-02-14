<?php
class Courses{

  private int $id;
  private array|object $list;
  private int $budget;
  private string $creation_date;
  private string $modification_date;
  private $bdd;

  public function __construct($bdd = null){
    if($bdd){
      $this->setBdd($bdd);
    }
  }

  public static function add(array $courses){
    $req = self::$bdd->prepare("INSERT INTO courses(list, budget) VALUES(:list, :budget)");
    $req->bindValue(":list", $courses["list"]);
    $req->bindValue(":budget", $courses["budget"], PDO::PARAM_INT);

    if(!$req->execute()){
      return false;
    }
    $req->closeCursor();
    return true;
  }

  public static function getById(int $id){
    $req = self::$bdd->prepare("SELECT * FROM courses WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
    $list = $req->fetch(PDO::FETCH_OBJ);
    $req->closeCursor();
    if(!$list){
      return null;
    }
    return $list;
  }

  public static function getAll(){
    $req = self::$bdd->prepare("SELECT * FROM courses");
    $req->execute();
    $lists = $req->fetchAll(PDO::FETCH_OBJ);
    $req->closeCursor();
    if(!$lists){
      return null;
    }
    return $lists;
  }

  public static function update(array $courses){
    $req = self::$bdd->prepare("UPDATE courses SET list=:list, budget=:budget WHERE id=:id");
    $req->bindValue(":id", $courses["id"], PDO::PARAM_INT);
    $req->bindValue(":list", $courses["list"]);
    if(!$req->execute()){
      return false;
    }
    $req->closeCursor();
    return true;
  }

  public static function updateList(int $id, array|object $list){
    $req = self::$bdd->prepare("UPDATE courses SET list=:list WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->bindValue(":list", $list);
    if(!$req->execute()){
      return false;
    }
    $req->closeCursor();
    return true;
  }

  public static function updateBudget(int $id, int $budget){
    $req = self::$bdd->prepare("UPDATE courses SET budget=:budget WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->bindValue(":budget", $budget, PDO::PARAM_INT);
    if(!$req->execute()){
      return false;
    }
    $req->closeCursor();
    return true;
  }

  public static function deleteById(int $id){
    return self::$bdd->exec("DELETE FROM courses WHERE id={$id}");
  }

  private function setBdd($bdd){
    $this->$bdd = $bdd;
  }

}