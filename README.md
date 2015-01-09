# izotop
PHP micro-framwork, trying to implement the MVC pattern as simple as possible

##NEEDED features:
* [x] support for themes
* [x] router with defaults
* [ ] failsafe - CHECK ALWAYS
* [ ] short and simple
* [ ] easy to maintain directory sturcture
* [ ] 1 core file: all project specific will be external files + project config file

##TODO:
* [ ] implement model
* [ ] implement an example theme
* [ ] check that everything else working optimally
* [ ] add comments and documentation
* [ ] better README

## Files Sructure Explanation
```
|-- public/
|   |-- assets/ 
|   |-- index.php
|   |-- .htacess
|-- app/
|   |-- themes/
|   |   |--  [sample_theme]/ 
|   |   |   | --  [sample_theme].php
|   |-- controllers/
|   |   |--  [sample_ctrl].php
|   |-- pages/
|   |   |--  [sample_ctrl]/
|   |   |    |--  [sample_page].php
|   |-- core.php
|   |-- config.php
|   |-- .htacess
|-- .htacces
```
##please, check this code - if you can make it better, pull request!
