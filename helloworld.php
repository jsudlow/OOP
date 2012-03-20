<?php

class HelloWorld {
  public $world;

  function __construct($world) {
    $this->world=$world;

  }

  function getHtml() {
    return "<html><body>". "Hello," . $this->world."!" . "</body></html>\n";
  }

  function rockname(){

    echo $this->world->name;

  }
}

class rock {

  public $name;

  function __construct($name) {
    $this->name=$name;
  }

}




$test = new HelloWorld('Targas');
print $test->getHtml();

$rock = new rock("A rock passed to initiate another class who is finding the name all OOP style");
$hello = new HelloWorld($rock);
$hello->rockname();


?>
