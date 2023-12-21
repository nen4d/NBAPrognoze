<?php

$password = "0f6HpRtHzl";

 $password_hash = password_hash($password, PASSWORD_BCRYPT);

 echo $password_hash;


 ?>
