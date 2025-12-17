<?php
    class Switch_salon extends  Controller
    {
        function index($id = '')
        {
            if (Auth::access('Supper_admin')) {
                # code...
                Auth::switch_salon($id);
            }
            $this-> redirect("salons");
        }
    }