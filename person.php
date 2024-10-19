<?php

class Person
{
  private $name;
  private $lastname;
  private $age;
  private $hp;
  private $mother;
  private $father;

  function __construct($name, $lastname, $age, $mother = null, $father = null)
  {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
    $this->hp = 100;
  }
  function getName()
  {
    return $this->name;
  }
  function getLastName()
  {
    return $this->lastname;
  }
  function getMother()
  {
    return $this->mother;
  }
  function getFather()
  {
    return $this->father;
  }
  function getInfo()
  {
    $str0 = "<h3>Пару слов о моих родных</h3><br>";
    $str1 = "Меня зовут " . $this->getName() . "<br> Моя фамилия " . $this->getLastName() . "<br><br>";
    $str2 = "&nbsp;&nbsp;Мою маму зовут " . $this->getMother()->getName() . "<br>&nbsp;&nbsp;Фамилия моей мамы " . $this->getMother()->getLastName() . "<br><br>";
    $str3 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Бабушку по материнской линии зовут " . $this->getMother()->getMother()->getName() . "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Её фамилия " . $this->getMother()->getMother()->getLastName() . "<br><br>";
    $str4 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Дедушку по материнской линии зовут " . $this->getMother()->getFather()->getName() . "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Его фамилия " . $this->getMother()->getFather()->getLastName() . "<br><br>";
    $str5 = "&nbsp;&nbsp;Моего отца зовут " . $this->getFather()->getName() . "<br>&nbsp;&nbsp;Фамилия моего отца " . $this->getFather()->getLastName() . "<br><br>";
    $str6 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Бабушку по отцовской линии зовут " . $this->getFather()->getMother()->getName() . "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Её фамилия " . $this->getFather()->getMother()->getLastName() . "<br><br>";
    $str7 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Дедушку по отцовской линии зовут " . $this->getFather()->getFather()->getName() . "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Его фамилия " . $this->getFather()->getFather()->getLastName() . "<br><br>";
    return $str0 . $str7 . $str6 . $str5 . $str4 . $str3 . $str2 . $str1;
  }
}

$platon = new Person("Platon", "Ivanov", 79);
$maria = new Person("Maria", "Jukova", 77);

$varvara = new Person("Varvara", "Petrova", 73);
$igor = new Person("Igor", "Petrov", 78);

$alexey = new Person("Alexey", "Ivanov", 41, $maria, $platon);
$olga = new Person("Olga", "Ivanova", 40, $varvara, $igor);
$valera = new Person("Valera", "Ivanov", 10, $olga, $alexey);

echo $valera->getInfo();
