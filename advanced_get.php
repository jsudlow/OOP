<?php

class Painting {
  private $_artist;

  function __construct($name) {
    $this->_artist=$name;
  }

  function __get($name) {
    $method = 'get'.$name;
    //echo $method;
    return $this->$method();
  }

  function getArtist() {
    return $this->_artist . "\n";
  }

}


$vangoe = new Painting('Vangoe');

//example of an auto get method acceccing like a regular old variable
echo "Artist Name: " . $vangoe->artist;

?>