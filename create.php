<?php session_start();
   if(isset($_POST['submit'])){
      require 'config.php';
      $insertOneResult = $collection->insertOne([
          'name' => $_POST['name'],
          'surname' => $_POST['surname'],
          'idno' => $_POST['idno'],
          'dob' => $_POST['dob'],
          //$dob = date("d-m-Y", strtotime($_POST['dob'])),


      ]);
      $_SESSION['success'] = "User added Successfully!!";
      header("Location: index.php");

      foreach($insertOneResult as $data) {
        if ($data->idno === $data->idno){
        echo "Id Number aleady exist!!";
        return false;
        } else {
            return true;
        }
      }
    }
    
   
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Infinty users</title>
      <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   </head>
   <body>
      <div class="container">
         <br>
         <CENTER><h1>Add A User</h1></CENTER>
         <a href="index.php" class="btn btn-primary">Back</a>
         <form method="POST"  id="usersForm" onsubmit="return validateForm()" name="enqueryForm">
            <div class="form-group">
               <strong>name:</strong>
               <input type="text" required class="form-control" name="name" required="" placeholder="Neslson">
               <strong>surname:</strong>
               <input type="text" required class="form-control" name="surname" placeholder="surname">
               <strong>ID number:</strong>
               <input type="number" id="mxlenght"  maxlength="13" class="form-control" name="idno" required="" placeholder="xxxxxx xxxx xxx">
               <p style="color: red;"><span></span> </p>
               <strong>Date of birth:</strong>
               <input type="date" id="dateofbirth" value="<?php //echo $date; ?>" class="form-control" name="dob" min="1905" max="2000" placeholder="dd-mm-YYYY" >
               <br>
               <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
            </div>
         </form>
      </div>


      <script type="text/javascript">

        function validateForm(){
            var validation = false;
            var idno = document.getElementById("mxlenght").value;
            if(idno.length < 13 && idno == idno) {
                alert("Your ID number is incorrect, make sure it is 13 numbers and try again");
                //e.preventDefault();
                return false;
    
            } else {
                return true;
            }
        }
         var minLength = 13;
         var maxLength = 13;
            $(document).ready(function(){
             $('#mxlenght').on('keydown keyup change', function(){
               var char = $(this).val();
               var charLength = $(this).val().length;
               if(charLength < minLength){
                     $('span').text('Length is short, minimum '+minLength+' required.').css("color","red");
               }else if(charLength > maxLength){
                     $('span').text('Length is not valid, maximum '+maxLength+' allowed.').css("color","red");
                     $(this).val(char.substring(0, maxLength));
               }else{
                     $('span').text('Length is valid').css("color","green");
                     return true;
                 }
               });

                //if the min len is less than 13 return false.. 
            });

      </script>
   </body>
</html>