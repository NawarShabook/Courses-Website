<?php
$words = explode(" ", "Community College District");
$acronym = "";

foreach ($words as $w) {
  $acronym .= $w[0];
}
echo $acronym;
?>

<?php if (isset( $_SESSION['username']))echo '<h3 class="user_name">'.$_SESSION['username'].'</h3>'; ?>