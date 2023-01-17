<?php
 include('header.php');
//  include('all_user.php');
//   $a = 'shoreful'; 
//   $b = 12345;
//   $c = true;
//   $d = ['shoreful',12345,12.4,true];
//  var_dump($d);
  
//  $a = 5;

// if($a % 2=='0'){
//     echo 'odd';
// }
// else{
//     echo 'even';
// }

// $sum = 0;
// $a=[["Shoreful"," Mardy"],["Monzurul"," Islam"],["Rajib"," Hossain"]];
// $counter = count($a);
//    for($i=0;$i<count($a);$i++)
//    {
//      for($j=0;$j<2;$j++)
//         {
//          echo $a[$i][$j];
//         }
//         echo "</br>";
//    }



    ///write a program that can say highscore 

    // $score = 
    // [
    //     ["rajib ", 12],
    //     ["mojurul ", 17],
    //     ["mardy ", 24],
    //     ["kamal ", 29],
    //     ["jakir ", 20]
    // ];
    // for($i=0;$i<count($score);$i++)
    //     {
    //         for($j=0;$j<2;$j++)
    //             {
    //             echo $score[$i][$j];
    //             }
    //             echo "</br>";
    //     };
    // $highscore = $score[0][1];
    // for($i = 1;$i<count($score);$i++)
    // {
    //     if($highscore<$score[0][$i])
    //     {
    //         $highscorer = $score[0][$i];
    //     }

    // }
    // echo $highscore;
    //// write a program that can show highscore and highscorer;
    // $studentName = [["shoreful ",112],["rajib",34],["monzurul",50]];
    //     $highscore = $studentName[0][1];
    //     $highscorer = $studentName[0][0]; 
    //     for($i=1;$i<count($studentName);$i++)
    //     {
    //         for($j=1;$j<2;$j++)
    //         {
    //             if($highscore<$studentName[$i][$j])
    //                 {
    //                     $highscore = $studentName[$i][$j];
    //                     $highscorer = $studentName[$i][$j-1];
    //                 };
    //         }
    //     }
    //     echo "highscorer is : ".$highscorer."</br> score:".$highscore;
    ///time format
    // date_default_timezone_set('asia/Dhaka');
    // echo $date = " Date:- ".date("l d/M/Y")."<br>";
    // echo $time = " Time:- ".date('h:i:s A')."<br>";
    // echo $time =date('l');

   //  $date = strtotime('january 9 2023');
   //  echo date('d/m/y'.$date);


   //readfile 
    //readfile('bisal.txt');
   //  $abc = fopen('bisal.txt','r');
   //  echo fread($abc,filesize('bisal.txt'));

   //// ip validation
   // $ip = '37.111.207.198';
   // if(filter_var($ip,FILTER_VALIDATE_IP)!==false){
   //    echo 'this'.$ip.'is valid';
   // }else{
   //    echo 'this.'.$ip.'is not valid ';
   // }
   
   /// email validation
   // $email = "pattrick@tutorialspoint.com";
   // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   //    echo("$email is a valid email address");
   // }
   // else{
   //    echo("$email is not a valid email address");
   // }

         ///form handling and validation 
         ///database connect and dynamic form submit


   $conn = mysqli_connect('localhost','root','','online-php');
 if(!$conn ){
   die('Connection failed'.mysqli_connect_error());
 }
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
      <input type="text" style="width: 100%;" required name="User_name" value="<?php echo $name ?>" id="name"><span
         style="color : red;"><?php echo $name_err ?></span><br>
      <label for="phone">Phone : </label>
      <input type="number" style="width: 100%;" required name="User_number" value="<?php echo $phone ?>" id="phone"><span
         style="color : red;"><?php echo $phone_err ?></span><br>
      <label for="email">Email:</label>
      <input type="email" style="width: 100%;" required name="User_email" value="<?php echo $email ?>"id="email"><span
         style="color : red;"><?php echo $email_err ?></span><br>
      <button type="submit" name="submit" class="btn btn-success">Submit</button>
      <a href="./all_user.php" class="btn btn-info">All User >></a>
   </form>
      </div>
   </div>
</div>
</body>

</html>