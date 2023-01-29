<?php
    class Core
    {
        //URL format --> /controller/method/params

        protected $currentController ='Pages';
        protected $currentMethod = 'home';
        protected $params = [];

        #instantiate the  constructor
        public function  __construct()
        {
            $url = $this->getURL();

            #check whether the file exists or not inside the app/controllers folder
            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php'))
            {
                #each controller must take words from url. 0 index is pointed to the controller of the url

                # if the controller exists, then load it
                $this->currentController=ucwords($url[0]);

                #unset the controller in the URL
                unset($url[0]);

                #call the controller
                require_once  '../app/controllers/'.$this->currentController.'.php';

                #instantiate the controller class
                $this->currentController = new $this -> currentController;
                #now 'currentController' this hold the object of this specific class




                #check whether the method exists in the controller or not
                if(isset($url[1]))         #if method specified
                {
                    if(method_exists($this->currentController,$url[1]))  #if method exist inside the class or not
                    {
                        $this->currentMethod=$url[1];

                        unset($url[1]);
                    }
                }



                #Get parameter list
                $this->params=$url ? array_values($url) : [];

                #call method and pass the parameter list
                call_user_func_array( [$this->currentController, $this->currentMethod] , $this->params);

            }

        }


        public function getURL()
        {
            #initialize controller class
            if(isset($_GET['url']))         #to check whether url is specified or not
            {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/',$url);

                return $url;
            }
        }
    }

?>
