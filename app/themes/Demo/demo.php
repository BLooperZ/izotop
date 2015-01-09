<?php

class Demo extends View 
{ 
  
  static function render() {
    echo self::$title;
    echo "-------<br>\n";
    self::printPage(); 
    echo "<br>------<br>\n";
  }
    
}
