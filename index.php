<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Infinity users</title>
	<link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<br>
		<CENTER>
			<h1>Infinity Users</h1>
		</CENTER>
		<a href="create.php" class="btn btn-success">Add</a>
		<?php
		if (isset($_SESSION['success'])) {
			echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
		}
		?>

<?php
		if (isset($_SESSION['error_message'])) {
			echo "<div class='alert alert-error'>" . $_SESSION['error_message'] . "</div>";
		}
		?>

		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Surname</th>
					<th scope="col">ID Number</th>
					<th scope="col">Date of birth</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<?php
			require 'config.php';
			$users = $collection->find();
			foreach ($users as $data) {

				echo "<tr>";
				echo "<th scope='row'>" . $data->name . "</th>";
				echo "<td>" . $data->surname . "</td>";
				echo "<td>" . $data->idno . "</td>";
				echo "<td>" . $data->dob . "</td>";
				echo "<td>";
				echo "<a href = 'edit.php?id=" . $data->_id . "'class='btn btn-primary'>EDIT</a>";
				echo "<a href = 'delete.php?id=" . $data->_id . "'class='btn btn-danger'>DELETE</a>";
				echo "</td>";
				echo "</tr>";
			}
			?>
		</table>
	</div>
</body>

</html>