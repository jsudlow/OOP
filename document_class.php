<?php

//PHP in Action example Chapter 2, Section: 2.1.5, Page:23

class Document {
  protected $title;
  protected $text;

  function __construct($title,$text) {
    $this->title = $title;
    $this->text = $text;
  }

  function print_title() {
    echo $this->title;
  }

  function print_text() {
    echo $this->text;
  }
    
}

class NewsArticle extends Document {
  private $introduction;

  function __construct($title,$text,$introduction) {
    parent::__construct($title,$text);
    $this->introduction = $introduction;
  }

  function print_intro() {
    echo $this->introduction;
  }

  function print_all() {
    $this->parent::print_title();
    $this->print_text();  
  }
}

$test = new  NewsArticle("jons essay", "There was a hobit named Frodo.", "an introduction among men");

$test->print_all();

?>
