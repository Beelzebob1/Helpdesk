<?php
include 'php/config.php';
session_start();

if(isset($_SESSION['status'])){
  $status = $_SESSION['status'];
} else {
  $status = 'guest';
}

$menu_items = array();
$nav_items = array();


if ($status == 'Admin') {
    $menu_items = array(
      'Uitloggen' => 'index.php?page=uitloggen',
    );
    $nav_items = array(
      'Overzicht' => 'index.php?page=overzicht_a',
    );
} elseif ($status == 'Klant') {
    $menu_items = array(
      'Overzicht' => 'index.php?page=overzicht',
      'Uitloggen' => 'index.php?page=uitloggen',
    );
    $nav_items = array(
      'Mobiel' => 'index.php?page=mobiel',
      'Internet' => 'index.php?page=internet',
    );
} elseif ($status == 'ICT') {
    $menu_items = array(
      'Overzicht' => 'index.php?page=overzicht',
      'Uitloggen' => 'index.php?page=uitloggen',
    );
    $nav_items = array(
      'Mobiel' => 'index.php?page=mobiel',
      'Internet' => 'index.php?page=internet',
      'TV' => 'index.php?page=tv',
    );
} elseif ($status == 'Helpdeskmedewerker') {
    $menu_items = array(
      'Overzicht' => 'index.php?page=overzicht',
      'Uitloggen' => 'index.php?page=uitloggen',
    );
    $nav_items = array(
      'Mobiel' => 'index.php?page=mobiel',
      'Internet' => 'index.php?page=internet',
      'TV' => 'index.php?page=tv',
      'Entertainment'=> 'index.php?page=entertainment',
    );
}else{
    $menu_items = array(
      'Login' => 'index.php?page=login',
      'Registratie' =>'index.php?page=registratie',
    );
    $nav_items = array(
      'Mobiel' => 'index.php?page=mobiel',
      'Internet' => 'index.php?page=internet',
      'TV' => 'index.php?page=tv',
      'Entertainment'=> 'index.php?page=entertainment',
      'Apparaten' => 'index.php?page=apparaten',
      'Contact' => 'index.php?page=contact',
    );
    $nav_items = array(
      'Mobiel' => 'index.php?page=mobiel',
      'Internet' => 'index.php?page=internet',
      'TV' => 'index.php?page=tv',
      'Entertainment'=> 'index.php?page=entertainment',
      'Apparaten' => 'index.php?page=apparaten',
      'Contact' => 'index.php?page=contact',
    );
}

?>

<div class="navigation">
    <ul class="nav">
      <?php
        foreach ($nav_items as $item => $pov){
          echo '<li><a href="' . $pov . '">' . $item . '</a></li>';
        }
        ?>
      </ul>
      
      
    <div class="dropdown" id="drop">
        <button class="overzicht" id="overzicht-btn">Overzicht</button>
        <div class="dropdown_menu" id="dropdown-menu">
            <?php
            foreach ($menu_items as $label => $link) {
                echo '<a href="' . $link . '">' . $label . '</a>';
            }
            ?>
        </div>
    </div>
</div>
