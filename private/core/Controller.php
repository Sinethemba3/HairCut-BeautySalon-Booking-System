<?php
    class Controller
    {
        public function controller_name()
        {
            return get_class($this);
        }

        public function view($view, $data = array())
        {
            extract($data);

            if (file_exists("../private/views/" . $view . ".view.php")) {
                require_once ("../private/views/" . $view . ".view.php");
            }
            else{
                require_once ("../private/views/_404.view.php");
            }
        }

        public function load_model($model)
        {
            if (file_exists("../private/models/" . ucfirst($model) . ".php")) {
                require_once ("../private/models/" . ucfirst($model) . ".php");
                return $model = new $model();
            }
            
            return false;
        }

        public function redirect($link)
        {
            header("Location: ". ROOT . "/" .trim($link, "/")); 
            die;
        }
    }