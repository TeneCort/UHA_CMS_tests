<?php

class Administration extends Model{
    
    protected $article, $adminNavBar;

    public function __construct(){
        parent:: __construct();          
    }

    public function adminNavBar(): AdminNavBar{
        $this->adminNavBar = new AdminNavBar();
        return $this->adminNavBar;
    }

}