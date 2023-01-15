<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <title><?php echo get_bloginfo('name');?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="icon" href="<? echo get_site_icon_url();?>" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"/>
<?php
$local_path = get_theme_file_path();
$page_uri = get_page_uri();
if($page_uri && is_file($local_path .'/'. $page_uri .'.css')){
  echo '<link rel="stylesheet" href="'. get_template_directory_uri() .'/'. $page_uri .'.css" />';
}
if($page_uri && is_file($local_path .'/'. $page_uri .'.js')){
  echo '<script src="'. get_template_directory_uri() .'/'. $page_uri .'.js" /></scripot>';
}
?>
</head>
<body>
  <header>
    <input id="toggle_menu" type="checkbox" style='display:none'>
    <a class='title-area' href='/'>
      <img class='logo' src='<?php echo get_site_icon_url();?>'>
      <div class='header-title'>
        <div class='title mincho bold'><?php echo get_bloginfo('name');?></div>
        <div class='catch gothic'><?php echo get_bloginfo('description');?></div>
      </div>
    </a>
    <nav>
      <ul>
<?php
$menus = wp_get_nav_menu_items('ヘッダメニュー');
if(!$menus){return;}
$html = '';
foreach($menus as $data){
  $html .= '<li>';
  $html .= '<a href="'. $data->url .'">';
  $html .= $data->title;
  $html .= '</a>';
  $html .= '</li>'.PHP_EOL;
}
echo $html;
?>
      </ul>
      <label class='hamburger' for='toggle_menu'>
        <span></span>
      </label>
    </nav>
  </header>
  <main>
