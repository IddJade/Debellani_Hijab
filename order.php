
<?php
   require_once ('includes/header.php');
?>
   <div class="w3-content"style="margin-left:20px">
   <div class="cover w3-container menu w3-padding-32" style="background-size:auto 100%; padding: 10px">
     <div class="w3-card w3-right w3-white w3-container" style="width:50%; background-size:auto 100%">
     <h3 class="w3-center"><span class="w3-white w3-wide">Login to <span class="w3-tag">Start</span></span></h3>
     <br/><br/>
      <form action="" method = "post">
      <p><input class="w3-input w3-border" type="email" placeholder="Email" name="email" required ></p>
      <p><input class="w3-input w3-border" type="password" placeholder="Password" name="password" required ></p>
    
<p class ="w3-text-red"><b><?php
      if(isset($_POST["login"])){
      if(!empty($_POST['email']) && !empty($_POST['password'])){
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $conn = new mysqli('localhost', 'root', '') or die(mysql_error());
      
      $db = mysqli_select_db($conn, "delicacies");
      $query=mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."' AND password='".$password."'");
      $numrows = mysqli_num_rows($query);
      if($numrows !=0)
      {
      while($row = mysqli_fetch_assoc($query))
      {
      $dbemail = $row['email'];
      $dbpassword = $row ['password'];
      $dbusername = $row ['name'];
      $dbphone = $row ['phone'];
      $dbaddress = $row ['address'];
      $dbid = $row ['id'];
      
      }
      if($email == $dbemail && $password == $dbpassword)
      {
      session_start();
      $_SESSION['sess_email']= $email;
      $_SESSION['username'] = $dbusername;
      $_SESSION['phone'] = $dbphone;
      $_SESSION['address'] = $dbaddress;
      $_SESSION['id'] = $dbid;
      
      header("Location: index.php");
      }
      }
      else
      {
      echo "Invalid email or password";
      }
      }
      else
      {
      echo"Required ALL fields";
      }
      }
      ?></b></p>
   
      <p><button class="w3-button w3-black w3-third" type="submit" value="Submit" name="login" > Login </button></p><br/><br/>
      <hr>
     </form>
      <form action="register.php">
      <button class="w3-button w3-round w3-block w3-left-align " type="submit" value="Submit" name="signup" >
      <center><p style="color:black">I'm a new customer</p><p style="color:black"><b> Sign up </b></p></center> </button>  
     
     </form>
     </div>
     </div>
   </div><hr>
  
  <?php

?>