<?php

Class Config
{
  static $db = array(
    'type' => 'mysql',
    'host' => '127.0.0.1',
    'name' => 'database_name',
    'user' => 'root',
    'pass' => 'root',
    'charset' => 'utf8',
  );

  static $ini = array(

    'zlib.output_compression' => 1,
    'zlib.output_compression_level' => -1,

    // Default charset
    'default_charset' => 'utf-8',

    // Default timezone
    'date.timezone' => 'Israel',

  );
  
  static $project = array(
    'name' => 'Site_Name',
    'description' => 'Site_Description',
    'author' => 'BLooperZ',
    'env' => 'development',
    'default_ctrl' => 'Main',
    'default_theme' => 'Demo',
    'title_separator' => ' - ',
    'site_lang' => 'he',
    'ga_wpid' => 'UA-XXXXX-X',
  );

}
