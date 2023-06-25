<?php
include('conn.php');
$name =" ";


$name_error ="";

$success =true ;
$id = $_GET['id'];



if (isset($_GET['id'])){
$query ="select* from category where id = ?";
$st=$con->prepare($query);
$st->bind_param('i',$id);
 $st->execute();
 $result = $st->get_result();
$row = $result->fetch_assoc();

 if(count($row)>1){
$name =$row ['name'];




}
}

// update

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['update'])){
        $name =$_POST['name'];


        if(empty($name)){
            $name_error =" the name requered ??";
            $success =false ;
    
        }


        if($success){
            $query = "update category set name =?  where id =? ";

$st = $con->prepare($query);
$st -> bind_param('si',$name ,$id );
$st->execute();
            header('location:category.php');
            
    
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