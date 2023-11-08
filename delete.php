<?php

session_start();

require 'config.php';

if (isset($_GET['id'])) {
   $data = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}

if (isset($_POST['submit'])) {
   require 'config.php';
   $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   $_SESSION['success'] = "User deleted sussesfully!";
   header("Location: index.php");
}
?>

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
         <h1>Delete this user!</h1>
      </CENTER>
      <p><strong>You are about to delete <span style="color: red;"><?php echo "$data->name"; ?> </span>As a Code infinity user,</strong> Do you want to continue?</p>
      <form method="POST">
         <div class="form-group">
            <input type="hidden" value="<?php echo "$data->surname"; ?>" class="form-control" name="surname">
            <a href="index.php" class="btn btn-primary">No</a>
            <button type="submit" name="submit" class="btn btn-danger">Yes Delete</button>
         </div>
      </form>
   </div>
</body>

</html>