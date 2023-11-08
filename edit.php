<?php session_start();

require 'config.php';
if (isset($_GET['id'])) {
   $data = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}

if (isset($_POST['submit'])) {
   $collection->updateOne(
      ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
      [
         '$set' =>
         [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'idno' => $_POST['idno'],
            'dob' => $_POST['dob'],
         ]
      ]
   );

   $_SESSION['success'] = "User updated Successfully!";
   header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>

<head>
   <title>USERS</title>
   <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
   <div class="container">
      <br>
      <CENTER>
         <h1>Edit Users</h1>
      </CENTER>
      <a href="index.php" class="btn btn-primary">Back</a>
      <form method="POST">
         <div class="form-group">
            <strong>name:</strong>
            <?php //$users = $collection->find();
            //foreach ($users as $data) {}
            ?>
            <input type="text" value="<?php echo "$data->name"; ?>" class="form-control" name="name" required="" placeholder="Neslson">
            <strong>surname:</strong>
            <input type="text" required value="<?php echo "$data->surname"; ?>" class="form-control" name="surname" placeholder="surname Lengkap">
            <strong>ID number:</strong>
            <input type="number" value="<?php echo "$data->idno"; ?>" maxlength="13" class="form-control" name="idno" placeholder="xxxxxx xxxx xxx">
            <strong>Date of birth:</strong>
            <input type="date" value="<?php echo "$data->dob";
                                       $dateInLocal; ?>" date-date-format="YYYY/MM/DD" class="form-control" name="dob" placeholder="xxxx-xx-xx">

            <br>
            <button type="submit" name="submit" class="btn btn-success">Update</button>
         </div>
      </form>
   </div>
</body>

</html>