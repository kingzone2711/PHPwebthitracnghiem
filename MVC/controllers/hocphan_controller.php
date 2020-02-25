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
  public function showPostHP()
  {
    $post = hocphan::find($_GET['MaHocPhan']);
    $data = array('post' => $post);
    $this->render('showPostSP', $data);
  }
  public function searchHP()
  {
    $post1 = hocphan::searchHP($_GET['search']);
    $data = array('post1' => $post1);
    $this->render('searchHP', $data);
  }
  public function searchHP1()
  {
      echo'oke nhe';
  }
}