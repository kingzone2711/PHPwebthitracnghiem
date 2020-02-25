<?php
class hocphan
{
  public $MaHocPhan;
  public $TenHocPhan;
  public $MAGV_Create;
  public $MaLop;
  public $Time_Start;
  public $Time_Stop;
  public $Time_Play;
  public $KeyLog;

  function __construct($MaHocPhan, $TenHocPhan, $MAGV_Create, $MaLop,$Time_Start, $Time_Stop, $Time_Play, $KeyLog)
  {
    $this->MaHocPhan = $MaHocPhan;
    $this->TenHocPhan = $TenHocPhan;
    $this->MAGV_Create = $MAGV_Create;
    $this->MaLop = $MaLop;
    $this->Time_Start = $Time_Start;
    $this->Time_Stop = $Time_Stop;
    $this->Time_Play = $Time_Play;
    $this->KeyLog = $KeyLog;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM hocphan');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Hocphan($item['MaHocPhan'], $item['TenHocPhan'], $item['MAGV_Create'], $item['MaLop'],$item['Time_Start'], $item['Time_Stop'], $item['Time_Play'], $item['KeyLog']);
    }
    return $list;
  }
  static function find($MaHocPhan)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM hocphan WHERE MaHocPhan = :MaHocPhan');
    $req->execute(array('MaHocPhan' => $MaHocPhan));

    $item = $req->fetch();
    if (isset($item['MaHocPhan'])) {
      return new Hocphan($item['MaHocPhan'], $item['TenHocPhan'], $item['MAGV_Create'], $item['MaLop'],$item['Time_Start'], $item['Time_Stop'], $item['Time_Play'], $item['KeyLog']);
    return null;
    }   
  }
  static function searchHP($search)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM hocphan WHERE MaHocPhan like :%search%');
    $req->execute(array('search' => $search));

    $item = $req->fetch();
    if (isset($item['search'])) {
      return new Hocphan($item['MaHocPhan'], $item['TenHocPhan'], $item['MAGV_Create'], $item['MaLop'],$item['Time_Start'], $item['Time_Stop'], $item['Time_Play'], $item['KeyLog']);
    return null;
    }
  }
}