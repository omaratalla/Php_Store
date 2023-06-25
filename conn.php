<?php
$server_name ="localhost";
$username="root";
$password='';
$db_name='store';

$con = mysqli_connect($server_name,$username,$password,$db_name);

if(mysqli_connect_errno()){
    echo"error to conect";
}else{
    return $con ;
}

?>