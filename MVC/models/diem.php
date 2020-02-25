<?php
class diem
{
  public $MaHP;
  public $TenSV;
  public $GioiTinh;

  function __construct($MaSV, $TenSV, $GioiTinh)
  {
    $this->MaSV = $MaSV;
    $this->TenSV = $TenSV;
    $this->GioiTinh = $GioiTinh;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM sinhvien');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Post($item['MaSV'], $item['TenSV'], $item['GioiTinh']);
    }
    return $list;
  }
  static function find($MaSV)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM sinhvien WHERE MaSV = :MaSV');
    $req->execute(array('MaSV' => $MaSV));

    $item = $req->fetch();
    if (isset($item['MaSV'])) {
      return new Post($item['MaSV'], $item['TenSV'], $item['GioiTinh']);
    }
    return null;
  }
  static function getHocPhan()
  {
    $listhp = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM hocphan');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Post($item['MaHocPhan'], $item['TenHocPhan']);
    }
    return $listhp;
  }
}