<?php
require_once('controllers/base_controller.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    $data = array(
      'name' => 'Sang Beo',
      'age' => 22
    );
    $this->render('home', $data);
  }

  public function index1()
  {
    $data = array(
      'name' => 'Sang Beo cute',
      'age' => 22
    );
    $this->render('index1', $data);
  }
  public function error()
  {
    $this->render('error');
  }
}