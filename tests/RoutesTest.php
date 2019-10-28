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
        $routeResponse = CurlRoutes("/home/index");;
        $this->assertEquals(preg_match('/200/', $routeResponse), '1');
    }
    public function testAdminRoute()
    {
        $routeResponse = CurlRoutes("/administration");;
        $this->assertEquals(preg_match('/200/', $routeResponse), '1');
    }
}
