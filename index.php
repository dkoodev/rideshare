<!DOCTYPE html>
<html>
<body>
<?php

$user = 'root';
$password = 'root';
$db = 'rideshare';
$host = 'localhost';
$port = 8889;

$link = mysqli_connect(
   "$host:$port", 
   $user, 
   $password
);
$db_selected = mysqli_select_db(
   $db, 
   $link
);


if($link){
	echo "My first PHP script!";

}else{
	echo " never mind";
}

?>

</body>
</html>