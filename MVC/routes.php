
<?php
$controllers = array(
  'pages' => ['home', 'error'],
  'posts' => ['index', 'showPost', 'test'],
  'hocphan' => ['indexHP','findtHP', 'showPostHP','searchHP','searchHP1']
);


if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'hocphan';
  $action = 'showPostHP';
}

include_once('controllers/' . $controller . '_controller.php');
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
