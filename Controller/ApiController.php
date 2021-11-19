<?php
require_once('View/ApiView.php');
require_once('Model/SongsModel.php');//fijarse si es necesario
require_once('Model/CommentsModel.php');

abstract class ApiController {
    
    protected $model; // lo instancia el hijo xq puede referirse a otro model
    protected $view;
    private $data; 

    public function __construct() {
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input"); 
    }

    function getData(){ 
        return json_decode($this->data); 
    }

}
  