<?php require_once "controllerAdminData.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Login - The Funding Network</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@1000&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'menu.php' ?>

    <div class="py-3">
        <h2 style="font-size: 50px; text-align: center;">Admin Reset Code</a></h2>

    </div>

    <div class="container">
    <div class="row">
        
        <div class="col-sm-4">
            
            </div>
            <div class="col-sm-4"></div>
        
    </div>
    <div class="row">
        
        <div class="col-sm-4">
           
        </div>

            <div class="col-sm-4">


                <div class="signup_form">
                    <form action="adminresetcode.php" method="POST">

                        <img src="Images/logo.png" alt="Funding Network" class="logo img-fluid">
                        <?php
                        if (isset($_SESSION['info'])) {
                        ?>
                            <div class="mb-4 appointment-head" style="padding: 0.4rem 0.4rem">
                                <?php echo $_SESSION['info']; ?>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if (count($errors) > 0) {
                        ?>
                            <div class="mb-4 appointment-head">
                                <?php
                                foreach ($errors as $showerror) {
                                    echo $showerror;
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="form-group">

                            <input class="form-control" type="number" name="otp" placeholder="Verification Code" required>

                        </div>

                        <button type="submit" name="check-reset-otp" value="Submit" class="btn btn-outline-success form_btn">Login Now</button>
<br>
<br>
<br>

                    </form>
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
    </div>
    <br>
    <br>
    <section>
        <footer>
            <p class="p-3 bg-dark text-white text-center">@NabeelRafique</p>
        </footer>
    </section>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


</html>