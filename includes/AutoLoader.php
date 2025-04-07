<?php
function load(string $className)
{
    include_once __DIR__ . "/../classes/" . $className . ".php";
}
spl_autoload_register('load');
