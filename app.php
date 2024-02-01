
<?php
require( dirname( __FILE__ ) . '/Routeur/Routeur.php' );
require(dirname(__FILE__) . '/routes.php');
require ("Autoloader.php");
Routeur::run();

?>
