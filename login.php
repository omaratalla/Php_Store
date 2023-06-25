<?php 
include('conn.php');

$email="";
$password="";
$error_password="";
$error_email="";

if($_SERVER['REQUEST_METHOD']==='POST'){
if (isset($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];

 $success = true;

if(empty($email)){
    $error_email="Please enter your email address";
    $success = false;

}

// if(empty($password)){
//     $error_password = "Please enter";
//     $success = false;
// }
if(empty($password)){
    $error_password="Please enter your pass address";
    $success = false;

}

if($success){
    $query = "select *from users where email = ? and password = ? ";
    $st=$con ->prepare ($query);
    $st -> bind_param('ss',$email,$password);
    $st->execute();
    $result = $st->get_result();
    $num_rows =mysqli_num_rows($result);
  
    if($num_rows > 0 ){
        header ('Location:index.php');
    }

    
}



}
}

?>
<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>login</title>
  </head>
  <body>
  <form action="" method="post">
<div class="container">
    <div class="row">
        <div class="col-4"></div>
<div class="col-4 m-3">
              <!-- Email input -->
  <div class="form-outline mb-4 " >
    <input type="email" name="email" id="email" class="form-control" />
    <label  for="email">Email </label>
    <small id="helpid" class="text-danger"><?php echo $error_email?></small>
  </div>

  <div class="form-outline mb-4">
    <input type="password" name="password" id="password" class="form-control" />
    <label  for="password">Email </label>
    <small id="helpid" class="text-danger"><?php echo $error_password?></small>
  </div>

  

  <!-- 2 column grid layout for inline styling -->


  <!-- Submit button -->
  <input type="submit" name="login" class="btn btn-primary btn-block mb-4" value="login">

  <!-- Register buttons -->

    </div>
</div>
<div class="col-4"></div>
</div>

</form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>