<?php
  $conn = mysqli_connect('localhost','root','','online-php');
  if(!$conn ){
    die('Connection failed'.mysqli_connect_error());
  }

// for delete data start
   if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM user WHERE id = '$id'";

    if(mysqli_query($conn,$sql)){
      echo 'Delete Successfully';
    }else{
      echo 'Delete failed!!';
    }
    
   }
// for delete data end


  $sql = "SELECT * FROM user ";
  $result = mysqli_query($conn,$sql);
  
?>


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
<div class="container">
  <div class="row">
    <div class="col-md-8 d-block m-auto">
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">phone number</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($row = mysqli_fetch_assoc($result)){ ?>
      <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['phone']?></td>
        <td><?php echo $row['email']?></td>
        <td><a class="btn btn-warning" href="edit.php?id= <?php echo $row['id']?>">Edit</a></td>
        <td><a onclick="return confirm('Are you sure want to delete this item ?')" class="btn btn-danger" href="?id= <?php echo $row['id']?>">Delete</a></td>
      </tr>
    <?php }
    ?>
  </tbody>
</table>
  <div class="col-8">
    <a class="btn btn-success text-center" href="./indax.php">Back to input page</a>
  </div>
    </div>
  </div>
</div>
</body>
</html>