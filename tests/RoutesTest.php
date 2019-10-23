<?php

require_once('init.php');
require_once('curltest.php');

use PHPUnit\Framework\TestCase;

 class RoutesTests extends TestCase
 {

    private $routeResponse;

    protected function setUp() : void
    {

    }

    public function testHomeIndexRoute()
    {
        //var_dump(phpinfo(32));
        //echo("http://" . $_SERVER['REMOTE_ADDR'] . ":" . $_SERVER["SERVER_PORT"] . "/");
        $routeResponse = CurlRoutes("127.0.0.1:8080/home/index");;
        $this->assertEquals(preg_match('/200/', $routeResponse), '1');
    }
    public function testAdminRoute()
    {
        $routeResponse = CurlRoutes("127.0.0.1:8080/administrationn");;
        $this->assertEquals(preg_match('/404/', $routeResponse), '1');
    }
}
