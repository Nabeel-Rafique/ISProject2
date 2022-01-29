<!DOCTYPE html>
<?php require_once("connection.php"); ?>
<html>
<head>
    <title>Sign Up - The Funding Network</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
 <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@1000&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'menu.php' ?>

    <div class="py-3">
        <h2 style="font-size: 50px; text-align: center;">Sign Up As a Donor</a></h2>
    
  </div>

<div class="container">
    <div class="row">
        
        <div class="col-sm-4">
            
            </div>
            <div class="col-sm-4"></div>
        
    </div>
    <div class="row">

<?php
    if(isset($_POST['signup']))
    {
        extract($_POST);
        if(strlen($F_name)<3)
        {
            $error[]=' Please enter atleast 3 characters in the First Name Slot';
        }
        if(strlen($F_name)>20){
            $error[] = 'First Name: No more that 20 Characters Allowed';
        }
        if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $L_name)){
            $error[] = 'Invalid Entry, Please Enter Letters Without any Digital or Special Symbols like (1,2,3#,$,%,&,*,!,@,-,^)';
        }
        if(strlen($L_name)<3)
        {
            $error[]=' Please enter atleast 3 characters in the Last Name Slot';
        }
        if(strlen($L_name)>20){
            $error[] = 'Last Name: No more that 20 Characters Allowed';
        }
        if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $L_name)){
            $error[] = 'Invalid Entry, Please Enter Letters Without any Digital or Special Symbols like (1,2,3,#,$,%,&,*,!,@,-,^)';
        }

        if(strlen($user_name)<3)
        {
            $error[]=' Please enter atleast 3 characters in the User Name Slot';
        }
        if(strlen($user_name)>20){
            $error[] = 'User Name: No more that 20 Characters Allowed';
        }
        if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $user_name)){
            $error[] = 'Invalid Entry, Please Enter Lower case Letters without any space and No Numbers at the start - Eg myusername, myusername123';
        }
        if(strlen($email)>50){
            $error[] = 'Email: Lenght of 50 Characters not allowed';
        }
        if($passwordConfirm ==''){
            $error[] = 'Please Confirm Your Password';
        }
        if($password != $passwordConfirm){ 
            $error[] = 'Passwords Do not Match';
        }
        if(strlen($password)<5){
            $error[] = 'The password must be more than 5 characters long';
        }
        if(strlen($password)>20){
            $error[] = 'Password Max lenght is 20 Characters';
        }
        $sql = "select * from users where (user_name='$user_name' or email='$email');";

        $res = mysqli_query($con,$sql);

if(mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_assoc($res);
    if($user_name==$row['user_name'])
    {
        $error[] = 'Username Already Exists';
    }
    if($email==$row['email'])
    {
        $error[] = 'Email Already Exists';
    }

}
if(!isset($error)){
    $date=date('Y-m-d');
        $options = array("cost"=>4);
        $password = password_hash($password, PASSWORD_BCRYPT,$options);

        $result = mysqli_query($con,"INSERT into users values('','$F_name','$L_name','$user_name','$email','$password','$date')");

        if($result)
        {
            $done=2;
        }
        else{
            $error[] = 'Failed: Something Went Wrong';
        }
}

}
?>

        
        <div class="col-sm-4">
            <?php
                    if(isset($error))
                    {
                        foreach($error as $error)
                        {
                            echo '<p class="errmsg">&#x26A0; '.$error.'</p>';
                        }
                    }
            ?>
        </div>
        <div class="col-sm-4">
            
<?php if(isset($done))
{ ?>
<div class="successmsg"><span style="font-size: 100px;">&#9989</span> <br> You Have Registered Successfully <br> <a href="login.php" style="color:#fff;"> Login Here... </a></div>
<?php }
        else { ?>           
            <div class="signup_form">
                <form action="" method="POST">
                    <div class="form-group">
                        <img src="Images/logo.png" alt="Funding Network" class="logo img-fluid">
                        <label class="label_txt">First Name</label>
                        <input type="text" class="form-control" name="F_name" value="<?php if(isset($error)) {echo $F_name;}?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="label_txt">Last Name</label>
                        <input type="text" class="form-control" name="L_name" value="<?php if(isset($error)) {echo $L_name;}?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="label_txt">User Name</label>
                        <input type="text" class="form-control" name="user_name" value="<?php if(isset($error)) {echo $user_name;}?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="label_txt">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php if(isset($error)) {echo $email;}?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="label_txt">Password</label>
                        <input type="password" class="form-control" name="password" required="">
                    </div>
                    <div class="form-group">
                        <label class="label_txt">Confirm Password</label>
                        <input type="password" class="form-control" name="passwordConfirm" required="">
                    </div>
                    <button type="submit" name="signup" class="btn btn-outline-success form_btn">Sign Up</button>
                    
<br>
    <p style="font-size: 12px; text-align: center; margin-top: 10px;">Already have an Account? <a href="loginLand.php">Login</a></p>
</form>
                    <?php } ?>
                
            </div>
        </div>
        <div class="col-sm-4">          
        </div>
        </div>
    <div class="col-sm-4">
        </div>
    </div>
</div>


<section>
  <footer>
    <p  class="p-3 bg-dark text-white text-center">@NabeelRafique</p>
  </footer>
</section>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


</html>