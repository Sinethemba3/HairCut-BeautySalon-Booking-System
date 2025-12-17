<?php
    class App
    {
        protected $controller = "home";
        protected $method = "index";
        protected $params = [];

		private function splitURL()
		{
			$URL = $_GET['url'] ?? 'home';
			$URL = explode("/", trim($URL,"/"));
			return $URL;	
		}

        public function __construct()
        {
            $URL = $this->splitURL();
			
            /** select controller **/
			$filename = "../private/controllers/".ucfirst($URL[0]).".php";
			if(file_exists($filename))
			{
				require $filename;
				$this->controller = ucfirst($URL[0]);
				unset($URL[0]);
			}else{

				$filename = "../private/controllers/_404.php";
				require $filename;
				$this->controller = "_404";
			}

            require_once "../private/controllers/".$this->controller.".php";
            $this->controller = new $this->controller();

            if (isset($URL[1])) 
            {
                if (method_exists($this->controller, $URL[1])) 
                {
                    $this->method = ucfirst($URL[1]);
                    unset($URL[1]);
                }
            }

            $URL = array_values($URL);
            $this->params = $URL;
            
            call_user_func_array([$this->controller, $this->method], $this->params);
        }
    }