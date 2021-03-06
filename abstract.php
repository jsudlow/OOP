<?php

abstract class OverloadableObject {
  function __call($name,$args) {
    $method = $name . "_" . count($args);
    if(!method_exists($this,$method)) {
      throw new Exception("Call to undefined method " . get_class($this)."::$method");
    }

    return call_user_func_array(array($this,$method),$args);

  }

}

class Multiplier extends OverloadableObject {
  function multiply_2($one,$two) {
    echo $one * $two;
  }



}

$multi = new Multiplier;
echo $multi->multiply(6,7);

//$load = new OverloadableObject;


?>
