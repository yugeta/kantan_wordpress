  </main>
  <footer>
  <nav>
    <input id='menu_toggle' type='checkbox' style='display:none;'>
    <ul>
<?php
$menus = wp_get_nav_menu_items('フッタメニュー');
if($menus){
  $html = '';
  foreach($menus as $data){
    $html .= '<li>';
    $html .= '<a href="'. $data->url .'">';
    $html .= $data->title;
    $html .= '</a>';
    $html .= '</li>'.PHP_EOL;
  }
  echo $html;
}
?>
    </ul>
    <div class='copy'>© 2023 Copyright MYNT, Inc. All Rights Reserved.</div>
  </footer>
</body>
</html>