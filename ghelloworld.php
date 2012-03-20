<?php

//PHP in Action, Example Chapter:2, Section: 2.1.5, Page:23
//Commentary: Jon Sudlow
//We use the HtmlDocument class in order to define any html document. We are tired of writing the same outer tags of our actual content every time we need to make a new page.
//The act of repeating ourselves time and time again leads us to realize a new way. With OOP we can construct a simple method in the parent class.
//This example also illustrates writing a method you plan for a child to override with the actual details in the parent class. This is a very good example.

//getContent() method in Hellow World now overrides the method in HtmlDocument, its parent class. Also the getHtml method works as if we had copied it, this is the power of extends.
//Now you see it is possible to extend another class off of HtmlDocument and over ride the content. You can re use this code to never write html tags again. Such a small example
//should get our minds adjusted to the many things possible with OOP


class HtmlDocument {
  function getHtml() {
    return "<html><body>" . $this->getContent() . "</body></html>";
  }

  function getContent() {
    return '';
  }

}

class HelloWorld extends HtmlDocument {
  public $world;

  function __construct($world) {
    $this->world = $world;
  }

  function getContent() {
    return "Hello" . $this->world;
  }

}

$test = new HelloWorld('Middle Earth');

$html = $test->getHtml();

print $html;

?>
