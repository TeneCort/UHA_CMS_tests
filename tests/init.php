<?php


define('OBJECTS', '../app/objects/');

foreach (glob(OBJECTS . "*.php") as $filename)
{
	require_once($filename);
}
