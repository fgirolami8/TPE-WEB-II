<?php
require_once 'Controller/ApiController.php';

class ApiSongController extends ApiController{

    public function __construct() {
        parent:: __construct();
        $this->model = new SongsModel();
    }

    public function getSong($params = []){
        $id = $params[':ID'];
        $song = $this->model->getSong($id);
        $this->view->response($song, 300);
    }

    
}
  