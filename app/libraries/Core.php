<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */

  class Core {
    protected $currentController = 'usersController';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
     $url = $this->getUrl();

     
     ////look in controller for the value
     if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){

      ///////// if exits, set as controller
      $this->currentController = ucwords($url[0]);

      /////unset 0 index
      unset($url[0]);
     }
    

     //////// require the controller //
     require_once '../app/controllers/' . $this->currentController . '.php';

     //////Instantiate controller
     $this->currentController = new $this->currentController;

     ////// check if second value exist
     if(isset($url[1])){
       if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];

          ////unset 1 value
          unset($url[1]);
       }
     }

     
     /////get Params
     $this->params = $url ? array_values($url) : [];

     ////call use func array
     call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);


        return $url;
      }else{
       $url = [$this->currentController];
       return $url;
      }
    }


  } 
  
  