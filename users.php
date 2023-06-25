<?php
include('conn.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "delete from users where id = $id";
	$st = $con->prepare($query);
	$st->execute();
}



?>
<!DOCTYPE html>

<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Atlantis Lite - Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<?php include('include/style.php') ?>


</head>

<body>
	<div class="wrapper">
		<!-- start nav -->
		<?php include('include/nav.php') ?>
		<!-- end nav -->

		<!-- Sidebar -->
		<?php include('include/sidebar.php') ?>

		<!-- End Sidebar -->


		<!-- start table -->
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Basic Table</div>
						</div>
						<div class="card-body">
							<div class="col-12">
								
								<a href="adduser.php" class="btn btn-primary ">add user</a>
							</div>

							<table class="table mt-3">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">name</th>
										<th scope="col">email</th>
										<th scope="col">password</th>
										<th scope="col">action</th>

									</tr>
								</thead>
								<?php
								$query = "SELECT * FROM users";
								$st = $con->prepare($query);
								$st->execute();
								$reulte = $st->get_result();
								?>
								<tbody>
									<?php
									$query = "select * from  users";
									$st = $con->prepare($query);
									$st->execute();
									$reulte = $st->get_result();
									$id = 1;
									while ($row = $reulte->fetch_assoc()) {
									?>
										<tr>
											<td><?php echo $id ?></td>
											<td><?php echo $row['name'] ?></td>
											<td><?php echo $row['email'] ?></td>

											<td><?php echo $row['password'] ?></td>

											<td>
												<a href="users.php ?id=<?php echo   $row['id'] ?>" class="btn btn-sm btn-danger">delete</a>
												<a href="Editeuser.php ?id=<?php echo   $row['id'] ?> " class="btn btn-sm btn-success">edit</a>

											</td>



										</tr>
									<?php $id++;
									} ?>
						</div>
					</div>

				</div>

			</div>
		</div>

	</div>
	<!-- end table -->





	<!-- start footer -->

	<!-- <?php include('include/footer.php') ?> -->



	<!-- end footer -->

	</div>

	<!-- Custom template | don't include it in your project! -->


	<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<?php include('include/script.php') ?>

	<!--end js  -->
</body>

</html>