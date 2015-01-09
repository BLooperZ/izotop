<?php

class Main extends Controller 
{
  const DEFAULT_ACT = 'home';
   
  static function home()
  {
    View::setPage(APP . 'pages/main/home.php');
  }
  
  static function bloop()
  {
    echo"fssssssssss";
  }
    
}
