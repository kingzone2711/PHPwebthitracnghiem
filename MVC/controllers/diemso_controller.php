<?php
require_once('controllers/base_controller.php');
require_once('models/hocphan.php');

class HocphanController extends BaseController
{
  function __construct()
  {
    $this->folder = 'HocPhan';
  }

  public function indexHP()
  {
    $posts = hocphan::all();
    $data = array('posts' => $posts);
    $this->render('indexHP', $data);
  }
}