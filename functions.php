<?php

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
  return 'トップページ（固定ページ）、投稿ページ、固定ページのどれかを表示';
}

function view_posts(){
  return '投稿一覧ページ';
}

function view_search(){
  return '検索ページ';
}