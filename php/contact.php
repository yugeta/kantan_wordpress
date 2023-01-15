<?php

if(isset($_POST['submit'])
&& isset($_POST['mode'])
&& $_POST['mode'] === 'contact'){
  new Contact();
  exit();
}

class Contact{
  public static $names = array(
    'genre'       => 'お問合せの種類',
    'fullname'    => 'お名前',
    'mailaddress' => 'メールアドレス',
    'comment'     => 'お問合せ内容'
  );

  public static $subject    = 'ホームページから、お問合せが送信されました。';
  public static $charset    = 'iso-2202-jp';
  public static $datas      = [];
  public static $redirect   = 'thanks';
  
  function __construct(){
    self::set_data();
    if(!self::$datas['to']){die('管理メールアドレスがセットされていません。');}
    $res = self::send_mail();
    if(!$res){die('メール送信エラー');}
    self::finish();
  }

  public static function set_data(){
    self::$datas['subject'] = self::$subject;
    self::$datas['to']      = get_option('admin_email');
    self::$datas['header']  = self::get_header();
    self::$datas['message'] = self::get_message();
  }

  public static function get_header(){
    return 'From: '. $_POST['mailaddress'];
  }

  public static function get_message(){
    $message  = '送信日時 : '    . date('Y-m-d H:i:s')."\r\n";
    $message .= '--'."\r\n";
    foreach(self::$names as $key => $name){
      if(!isset($_POST[$key])){continue;}
      $message .= $name .' : '. $_POST[$key]."\r\n";
    }
    $message .= '--'."\r\n";
    $message .= 'UserAgent : '  . $_SERVER['HTTP_USER_AGENT']."\r\n";
    $message .= 'IP-Address : ' . $_SERVER['REMOTE_ADDR']."\r\n";
    $message .= '--'."\r\n";
    $message .= "\r\n";
    return $message;
  }

  public static function finish(){
    $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : self::$redirect;
    header('Location: ./'. $redirect .'/');
    exit();
  }

  public static function send_mail(){
    return mb_send_mail(
      self::$datas['to'],
      self::$datas['subject'],
      self::$datas['message'],
      self::$datas['header']
    );
  }
}