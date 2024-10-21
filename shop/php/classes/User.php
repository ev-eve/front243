<?php

class User
{
  private $name;
  private $lastname;
  private $email;
  private $id;

  function __construct($id, $name, $lastname, $email)
  {
    $this->id = $id;
    $this->name = $name;
    $this->lastname = $lastname;
    $this->email = $email;
  }
  function getId()
  {
    return $this->id;
  }
  function getName()
  {
    return $this->name;
  }
  function getLastname()
  {
    return $this->lastname;
  }
  function getEmail()
  {
    return $this->email;
  }

  //Статический метод добавления пользователя в БД
  static function addUser($name, $lastname, $email, $pass)
  {
    global $mysqli;
    //var_dump($mysqli);
    $email = mb_strtolower(trim($email));
    $pass = trim($pass);
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");

    if ($result->num_rows != 0) {

      return json_encode(["result" => "exist"]);
    } else if (!empty($name) && !empty($lastname) && !empty($email)  && !empty($pass)) {

      $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name','$lastname','$email','$pass')");
      return json_encode(["result" => "success"]);
    } else {

      return json_encode(["result" => "empty"]);
    }
  }
  // статический метод авторизации. GLOBAL вспомнить, не забыть сессию. сессия старт в роутере, еще один route выбор, формочка login -> функция, после авторизации на страницу личного кабинете(нюанc) 

  static function loginUser($email, $pass)
  {
    global $mysqli;
    //var_dump($mysqli);
    $email = mb_strtolower(trim($email));
    $pass = trim($pass);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $result = $result->fetch_assoc();
    //var_dump($result);

    if (password_verify($pass, $result["pass"])) {
      $_SESSION["id"] = $result["id"];
      $_SESSION["name"] = $result["name"];
      $_SESSION["lastname"] = $result["lastname"];
      $_SESSION["email"] = $result["email"];
      return json_encode(["result" => "exist"]);
    } else {
      return json_encode(["result" => "wrong"]);
    }
  }
}
