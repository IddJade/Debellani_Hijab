<html>
<?php 
include ('header.php');
?>
<div class="w3-main" style="margin-left:340px;margin-right:40px">
 <h1 class="w3-xxlarge"><b>Admin Page</b></h1>
      <hr style="width:250px;border:3px solid black" class="w3-round">     
   <div class="w3-container" id="contact" style="margin-top:75px">
     <h1 class="w3-large w3-text-grey"><b>Login</b></h1>
     <p>Please login to enter Delicaces Accessories Website management.</p>
     <nav style="max-width: 600px;">

  <form action="" method = "post">
        <p><input class="w3-input w3-border" type="email" placeholder="Email" name="email" required ></p>
        <p><input class="w3-input w3-border" type="password" placeholder="Password" name="password" required ></p>
        <br/>

        <p class ="w3-text-red"><b><?php
        if(isset($_POST["login"])){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $conn = new mysqli('localhost', 'root', '') or die(mysql_error());
        
        $db = mysqli_select_db($conn, "delicacies");
        $query=mysqli_query($conn, "SELECT * FROM admin WHERE email='".$email."' AND password='".$password."'");
        $numrows = mysqli_num_rows($query);
        if($numrows !=0)
        {
        while($row = mysqli_fetch_assoc($query))
        {
        $dbemail = $row['email'];
        $dbpassword = $row ['password'];
        $dbusername = $row ['name'];
        }
        if($email == $dbemail && $password == $dbpassword)
        {
        session_start();
        $_SESSION['email']= $email;
        $_SESSION['user'] = $dbusername;
        
        header("Location: admin_product.php");
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
        </nav>
       </div>
       </div>
</html>