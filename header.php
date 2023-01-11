<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <title><?php echo get_bloginfo('name');?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="icon" href="<? echo get_site_icon_url();?>" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"/>
  <script src="<?php echo get_template_directory_uri();?>/js/main.js"></script>
</head>
<body>
  <header>
    <a class='title-area' href='/'>
      <div class='catch gothic'><?php echo get_bloginfo('description');?></div>
      <div class='title mincho bold'>
        <img class='logo' src='<?php echo get_template_directory_uri();?>/img/logo.svg'>
      <?php echo get_bloginfo('name');?></div>
    </a>
    <nav>
      <input id='menu_toggle' type='checkbox' style='display:none;'>
      <ul></ul>
      <label for='menu_toggle'>
        <span></span>
        <span></span>
        <span></span>
      </label>
    </nav>
  </header>
  <main>
