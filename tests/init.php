<?php

use PHPUnit\Framework\TestCase;

define('OBJECTS', '../app/objects/');

foreach (glob(OBJECTS . "*.php") as $filename)
{
	require $filename;
}
