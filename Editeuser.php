<?php
include('conn.php');
$name =" ";
$email=" ";
$password=" ";

$name_error ="";
$email_error ="";
$password_error ="";
$success =true ;
$id = $_GET['id'];



if (isset($_GET['id'])){
$query ="select* from users where id = ?";
$st=$con->prepare($query);
$st->bind_param('i',$id);
 $st->execute();
 $result = $st->get_result();
$row = $result->fetch_assoc();

 if(count($row)>1){
$name =$row ['name'];
$email =$row ['email'];
$password =$row ['password'];



}
}

// update

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['update'])){
        $name =$_POST['name'];
        $email =$_POST['email'];
        $password =$_POST['password'];

        if(empty($name)){
            $name_error =" the name requered ??";
            $success =false ;
    
        }
        if(empty($email)){
            $author_error =" the email requered ??";
            $success =false ;
    
        }
          if(empty($password)){
            $pages_error =" the password requered ??";
            $success =false ;
    
        }

        if($success){
            $query = "update users set name =? , email=? , password=?  where id =?";

$st = $con->prepare($query);
$st -> bind_param('sssi',$name ,$email ,$password, $id);
$st->execute();
            header('location:users.php');
            
    
        }


    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
            <form action="" method="post">
                

            <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control"  id="name" placeholder="" value="<?php echo $name?>">
                        <p class="text-danger"><?php echo $name_error?></p>
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="" value="<?php echo $email?>">
                        <p class="text-danger"><?php echo $email_error?></p>

                    </div>

                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="" value="<?php echo $password?>">
                        <p class="text-danger"><?php echo $password_error?></p>

                    </div>


                    <input type="submit" name="update" class="btn btn-primary" value="update">
                    <a href="" class="btn btn-danger">cancel</a>
                    </form>

                </div>
            <div class="col-4"></div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>