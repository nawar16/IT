<?php
function install($file){
    $argv = array(
         '--install-dir=/usr/local/bin', 
         '--filename=composer.phar',
         'self-update',
         '--version=1.10.4'
         
    );
    include_once($file);
}
$installerFilename = "composer-installer.php";
$composer_installer_content  = file_get_contents('https://getcomposer.org/installer');
$find = array('#!/usr/bin/env php', 'exit(','print');
$replace = array('', 'return(','print');
$new_composer_installer_content = str_replace($find,$replace, $composer_installer_content);
file_put_contents($installerFilename, $new_composer_installer_content);
//copy($installerFilename, '/usr/local/bin/composer/'.$installerFilename);
$return = install($installerFilename);

/*

Warning: is_dir(): open_basedir restriction in effect. File(/usr/local/bin) is not within the allowed path(s): (/opt/awex-pages:/storage/ssd4/794/13463794) in /storage/ssd4/794/13463794/public_html/public/composer-installer.php on line 186
The defined install dir (/usr/local/bin) does not exist. 

*/