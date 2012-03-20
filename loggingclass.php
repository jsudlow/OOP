<?php

class LoggingClass {

  function __call($method, $args) {
    $method = "_$method";

    if(!method_exists($this,$method)){
      throw new Exception("Call to undefined method " . get_class($this) . "::$method");
    }    

    echo ("Just starting method $method \n");

    $return = call_user_func_array(array($this,$method), $args);

    echo("Just finished calling method $method\n");
    
    return $return;
  }

  function _talk() {
    echo "Im so talky when I execute the method \n";

  }
}

class DateAndTime extends LoggingClass {
  private $timestamp;

  function __construct($timestamp=FALSE) {

    $this->init($timestamp);

  }

  protected function _init($timestamp) {

    $this->timestamp = $timestamp ? $timestamp : time();

  }

  function getTimestamp() {
    return $this->timestamp;
  }

  protected function _before(DateAndTime $other) {
    return $this->timestamp < $other->getTimestamp();
  }


  }





$logger = new LoggingClass;
$logger->talk();

$now = new DateAndTime;

$nexthour = new DateAndTime (time() + 3600);
print_r(array($now,$nexthour));

if ( $now->before($nexthour)) {

  echo "OK\n";

}
?>
