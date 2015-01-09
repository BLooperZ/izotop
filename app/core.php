<?php

Class View
{
  static $page;
  static $title;
    
  static function setPage($page, $title = '') {
    if (! file_exists($page))
      Controller::error('404');
    else {
      self::$page = $page;
      self::$title = Config::$project['name'];
      if (! empty($title))
        self::$title .= Config::$project['title_separator'] . $title;
    }
  }
  
  static function render() {
    echo self::$title;
    echo "=============================================================<br>\n";
    self::printPage(); 
    echo "<br>=============================================================<br>\n";
  }
  
  static function printPage() {
    $controller = Site::$callback[0];
    include self::$page;   
  }
  
}

Class Controller
{
  const DEFAULT_ACT = 'welcome';
  static $error;
  
  static function error($code = '404') {
    header(Helper::httpStatus($code));
    self::$error = $code;
    if (file_exists(APP . "pages/error/$code.php"))
      $page = APP . "pages/error/$code.php";
    elseif (file_exists(APP . "pages/error/general.php"))
      $page =  APP . 'pages/error/general.php';
    else exit("ERROR $code");
    View::setPage($page, "Error $code");
    Site::$theme = 'error';
  }
  
  static function welcome() {
    View::setPage( APP . "pages/install.php", 'Welcome');
  }
  
}

Class Site
{  
  static $callback;
  static $params;
  static $theme;
    
  function run() {
    self::set();
    self::route();
    call_user_func_array(self::$callback, self::$params);
    
    if (! empty(View::$page)) {
      $theme = (isset(self::$theme)) ? self::$theme : Config::$project['default_theme'];
      if (is_readable(APP . "themes/$theme/$theme.php"))
        require_once APP . "themes/$theme/$theme.php";
      else
        $theme = 'View';
      $theme::render();
    }
    
  }
  
  static function set() {
    //Set error display level
    switch (Config::$project['env']) {
      case 'development':
        error_reporting(-1);
        ini_set('display_errors', 1);
        break;
      case 'production':
        ini_set('display_errors', 0);
        break;
      default:
        exit('Application environment is set incorrectly.');
    } 
    foreach (Config::$ini as $key => $value) 
      ini_set($key, $value);  
  }
  
  static function route() {
    $url = (isset($_GET['url'])) ? filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL) : '';
    $url = explode('/', $url);
    if (! is_readable(APP . 'controllers/' . $url[0] . '.php')) {
      $default = Config::$project['default_ctrl'];
      if (! is_readable(APP . 'controllers/' . $default . '.php')) 
        $default = 'Controller';
      array_unshift($url, $default);
    }
    if (! class_exists ($url[0])) 
      require_once APP . 'controllers/' . $url[0] . '.php';
    if (empty($url[1])) 
      $url[1] = $url[0]::DEFAULT_ACT;
    if (! method_exists($url[0], $url[1])) {
      $url[1] = 'error'; 
      $url[2] = 404;
    }   
    self::$callback = array($url[0], $url[1]);
    self::$params = array_slice($url, 2);
  }

}
