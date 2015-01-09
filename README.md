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

## Files Sructure Explanation
.
├── public
|   ├── assets/ 
|   |     --- the assets for the website - CSS, JS, Images....
|   ├── index.php
|   |     --- the file to run
|   └── .htacess - get index.php to work
├── app
|   ├── themes/
|   |   |  --- themes directory.....
|   |   ├── [sample_theme]/ 
|   |   |   |--- will contain the theme files....
|   |   |   └── [sample_theme].php
|   |   └──        --- will contain class called [sample_theme] which make the theme
|   ├── controllers/
|   |   |  --- controllers directory.....
|   |   └── [sample_ctrl].php
|   |          --- will contain class called [sample_ctrl] which will have the pages as methods
|   ├── core.php
|   |     --- the framework itself.....
|   ├── config.php
|   |     --- project specific configuration.....
|   └── .htacess - get index.php to work
└── .htaccess - redirect to public/

##please, check this code - if you can make it better, pull request!
