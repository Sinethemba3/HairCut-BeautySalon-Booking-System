<?php
    class Logout extends  Controller
    {
        public function index()
        {
            $ses = new Session;
		    $ses->logout();
            
            $this-> redirect("/home");
        }
    }