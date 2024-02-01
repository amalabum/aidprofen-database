<?php
function autoloadcrudClasses($className) {
    $filename =__DIR__.DIRECTORY_SEPARATOR. "App/crud_core/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}
function autoloadTables($className) {
    $filename =__DIR__.DIRECTORY_SEPARATOR. "App/Application/MT_CORE/MT_CORE_FRONT/Tableaux/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}
function autoloadFormulaires($className) {
    $filename =__DIR__.DIRECTORY_SEPARATOR. "App/Application/MT_CORE/MT_CORE_FRONT/Formulaires/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}
function autoloadHeaders($className) {
    $filename =__DIR__.DIRECTORY_SEPARATOR. "App/Application/MT_CORE/MT_CORE_FRONT/Headers/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}
spl_autoload_register("autoloadcrudClasses");
spl_autoload_register("autoloadTables");
spl_autoload_register("autoloadFormulaires");
spl_autoload_register("autoloadHeaders");
?>