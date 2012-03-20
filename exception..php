<?php


//simple logger class to log errors to a custom file
class logger{
  public function log($error_message) {
    $fh = fopen("exception_error_log.txt","a");
    fwrite($fh, $error_message);
  }
}



//simple config class
class config {
  public function getDB() {
    if(!array_key_exists('DB_NAME', $_ENV)) throw new ConfigurationException("DB Name is somehow not set", ConfigurationException::DB_CONNECTION_ERROR); 
  }
}



//custom exception class
class ConfigurationException extends Exception {
  const DB_CONNECTION_ERROR = 2;
  const SQL_SYNTAX_ERROR = 1;

}


//intercepting erros from PHP
class ErrorFromPHPException extends Exception {}



  function PHPErrorHandler($errno, $errstr, $errfile, $errline) {
    echo "Im in the custom overrding php error class now!";
    throw new ErrorFromPHPException($errstr, $errno);

  }




$test = new config();
$logger = new logger();
try {
  $test->getDB();
}
catch (ConfigurationException $e) {
  $logger->log($e->getMessage());
  echo "go to predefined ewwah page!";

  //echo $e->getCode();
  switch($e->getCode()) {
  case ConfigurationException::DB_CONNECTION_ERROR:
    echo "Connection error\n";
    break;
  case ConfigurationException::SQL_SYNTAX_ERROR:
    echo "SQL Syntax Error!\n";
    break;  

  }
   

}

//switch error handler in order to test out the new exception PHP natural error catching mechanism
$oldHandler = set_error_handler('PHPErrorHandler');
fopen('/tmp/non-existant','r');




?>

