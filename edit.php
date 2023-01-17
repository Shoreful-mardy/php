<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>



<?php

   $conn = mysqli_connect('localhost','root','','online-php');

 if(!$conn ){
   die('Connection failed'.mysqli_connect_error());
 }


 // for edit data start
 if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);


    
   }
// for edit data end


   $name = $phone= $email = '';
   $name_err = $phone_err= $email_err = null;


  if(isset($_POST['submit'])){

         if($_POST['User_name'] != ''){
            $name =verify_data( $_POST['User_name']);
         }else{
            $name_err = " name fild is blank";
         }

         if($_POST['User_number'] != ''){
            $phone = verify_data($_POST['User_number']);
         }else{
            $phone_err = " phone fild is blank";
         }

         if($_POST['User_email'] != ''){
            $email =verify_data($_POST['User_email']) ;
                  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                     $email_err = ' Email format is not valid ';
                  }
         }else{
            $email_err = " email fild is blank";
           }

 if($name_err== null && $phone_err== null && $email_err== null){
         $sql = "INSERT INTO user(name,phone,email) VALUES('$name','$phone','$email')";

                  if (mysqli_query($conn,$sql)) {
                     echo 'data insert succesfully';
                  }else{
                     echo 'data insert failed . error:'.$sql . '<br>' . mysqli_error($conn);
                  }
  }
      
}
    function verify_data($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
   ?>
<div class="container">
   <div class="row">
      <div class="col-8 d-block m-auto">
      <form action="" method="POST">
      <label for="name">Name : </label>
      <input type="text" style="width: 100%;" required name="User_name" value="<?php echo $row['name'] ?>" id="name"><span
         style="color : red;"><?php echo $name_err ?></span><br>
      <label for="phone">Phone : </label>
      <input type="number" style="width: 100%;" required name="User_number" value="<?php $row['phone'] ?>" id="phone"><span
         style="color : red;"><?php echo $phone_err ?></span><br>
      <label for="email">Email:</label>
      <input type="email" style="width: 100%;" required name="User_email" value="<?php echo $row['email'] ?>" id="email"><span
         style="color : red;"><?php echo $email_err ?></span><br>
      <button type="submit" name="submit" class="btn btn-success">Submit</button>
      <a href="./all_user.php" class="btn btn-info">All User >></a>
   </form>
      </div>
   </div>
</div>
</body>

</html>