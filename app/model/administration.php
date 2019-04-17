<?php

class Administration extends Model{
    
    protected $article;

    public function __construct(){
        parent:: __construct();          
    }

    public function adminNavBar(): AdminNavBar{
        $adminNavBar = new AdminNavBar();
        return $adminNavBar;
    }

}