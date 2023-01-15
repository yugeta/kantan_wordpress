<?php

require_once 'php/contact.php';

function get_content(){
  // サイトトップページ
  if(is_front_page()){
    echo view_page();
  }
  // 固定ページ
  else if(is_page()){
    echo view_page();
  }
  // 投稿ページ
  else if(is_single()){
    echo view_page();
  }
  // 投稿一覧ページ
  else if(is_home()){
    echo view_posts();
  }
  // 検索ページ
  else if(is_search()){
    echo view_search();
  }
}

function view_page(){
//   return get_the_content();
//   return get_post();
  the_content();
}

function view_posts(){
  return '投稿一覧ページ';
}

function view_search(){
  return '検索ページ';
}

// mediaパスからドメインを取り除くショートカット
function delete_host_from_attachment_url($url){
  $ptn = '/^http(s)?:\/\/[^\/\s]+(.*)$/';
  if ( preg_match( $ptn, $url, $m ) ) {
      $url = $m[2];
  }
  return $url;
}
add_filter(
  'wp_get_attachment_url', 
  'delete_host_from_attachment_url'
);
add_filter(
  'attachment_link', 
  'delete_host_from_attachment_url'
);


// 記事のショートコード対応
function view_foo_function(){
  return 'foo';
}
add_shortcode('view_foo', 'view_foo_function');

// 値の受け渡し
function view_bar_function($atts=[]){
    extract(shortcode_atts(['text' => ''] , $atts));
  return 'foo: '. $text;
}
add_shortcode('view_bar', 'view_bar_function');

// HTMLの埋め込み値取得
function view_html_function($atts=[] , $content=null){
  return 'html: '. $content .' -> link';
}
add_shortcode('view_html', 'view_html_function');