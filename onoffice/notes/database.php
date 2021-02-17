<?php

$connection = mysqli_connect(
  'localhost', 'root', '', 'real_estate'
);

// for testing connection
#if($connection) {
#  echo 'database is connected';
#}

?>
