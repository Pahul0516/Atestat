<html>
    
    
    <head>
        <link rel="stylesheet" type="text/css" href="style_autentificare_si_inregistrare.css">
        <title>Conectare</title>
        <link rel="shortcut icon" href="Imagini/Nespresso.jpg" type="image/x-icon">
    </head>
    <body>

        <header>
              <a href="index.php"> <img src="Imagini/Nespresso-Logo.png" width="150px" height="30px"> </a>
        </header>   
        
        <?php
            include("conectare_baza_de_date.php");
        ?>
        
        <div class="wrapper">
            <a href="index.php"><span class="icon-close"><ion-icon name="close"></ion-icon></span></a>
            <div class="form-box login">
                <h2>Login</h2>
                <form action="" method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="text" name = "email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <button type="submit" class="Btn" name="buton1">Log in</button>
                    <div class="login-register">
                        <p>Don't have an acconut <a href="#" class="register-link">Register</a></p>
                    </div>
                    
                    
                    <?php
                        include("conectare_baza_de_date.php");
                        if(isset($_POST['buton1'])) 
                        {
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            if($email=="admin" && $password=="admin")
                            {
                                header("Location: admin_welcome.php");
                                exit();
                            }
                            else 
                            {
                                $stmt = mysqli_prepare($id_con, "SELECT * FROM utilizator WHERE email=? AND password=?");
                                mysqli_stmt_bind_param($stmt, "ss", $email, $password);
                                mysqli_stmt_execute($stmt);
                                $rez = mysqli_stmt_get_result($stmt);
                                if (mysqli_num_rows($rez) > 0) 
                                {
                                    session_start();
                                    $sql2 = "SELECT nume, prenume FROM utilizator WHERE email=?";  // aici ? este un parametru
                                    $stmt2 = mysqli_prepare($id_con, $sql2); // pregateste interogarea mysql 
                                    mysqli_stmt_bind_param($stmt2, "s", $email); // inlocuieste parametrii
                                    mysqli_stmt_execute($stmt2); // executa interogarea
                                    $result2 = mysqli_stmt_get_result($stmt2); // returneaza rezultatul
                                    $row2 = mysqli_fetch_assoc($result2); 
                                    $nume_prenume = $row2['nume'] . " " . $row2['prenume'];
                                    $_SESSION['nume_prenume'] = $nume_prenume;
                                    $_SESSION['log_in'] = true;

                                    header("Location: index.php");
                                    exit();
                                }
                                else 
                                {
                                    ?>
                                    <div class="fail">
                                        <p style="color:red; text-align: center; font-weight: 500;">Date incorecte!</p>
                                    </div>
                                    <?php
                                }
                            }
                        }


                    ?>
                    
                </form>
            </div>
            
            
            
            <div class="form-box register">
                <h2>Registration</h2>
                <form action=""  method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" required name="nume">
                        <label>Nume</label>
                    </div>  
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" required name="prenume">
                        <label>Prenume</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="text" required name="email">
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" required name="parola">
                        <label>Password</label>
                    </div>
                    <button type="submit" class="Btn2" name="buton2">Register</button>
                    <div class="login-register">
                        <p>Already have an acconut <a href="#" class="login-link">Login</a></p>
                    </div>
                    
                    <?php
                        include("conectare_baza_de_date.php");
                        if(isset($_POST['buton2']))
                        {
                            $nume=$_POST['nume'];
                            $prenume=$_POST['prenume'];
                            $email=$_POST['email'];
                            $parola=$_POST['parola'];

                            $sql10="SELECT * FROM `utilizator` WHERE `email` = '$email' ";
                            $rez10=mysqli_query($id_con,$sql10);

                            $sql20="SELECT * FROM `utilizator` WHERE `password` ='$parola'";
                            $rez20=mysqli_query($id_con,$sql20);


                            if (mysqli_num_rows($rez10)==1 && mysqli_num_rows($rez20)==1)
                            {
                                $error=true;
                                 ?>
                                    <div class="fail">
                                        <p style="color:red; text-align: center; font-weight: 500;">Email si parola existente!</p>
                                    </div>
                                <?php
                            }
                            else
                            {
                                if (mysqli_num_rows($rez10)==1)
                                {
                                     $error=true;
                                      ?>
                                    <div class="fail">
                                        <p style="color:red; text-align: center; font-weight: 500;">Email existent!</p>
                                    </div>
                                <?php
                                }
                                else 
                                {
                                    if (mysqli_num_rows($rez20)==1)
                                    {
                                         $error=true;
                                         ?>
                                    <div class="fail">
                                        <p style="color:red; text-align: center; font-weight: 500;">Parola existenta!</p>
                                    </div>
                                <?php
                                    }
                                    else 
                                    {
                                        $sql30= "INSERT INTO utilizator ( `nume`, `prenume`, `email`, `password`) VALUES ('$nume','$prenume','$email','$parola')";
                                        mysqli_query($id_con,$sql30);
                                            
                                        session_start();
                                        $sql40 = "SELECT nume, prenume FROM utilizator WHERE email=?";  // aici ? este un parametru
                                        $stmt40 = mysqli_prepare($id_con, $sql40); // pregateste interogarea mysql 
                                        mysqli_stmt_bind_param($stmt40, "s", $email); // inlocuieste parametrii
                                        mysqli_stmt_execute($stmt40); // executa interogarea
                                        $result40 = mysqli_stmt_get_result($stmt40); // returneaza rezultatul
                                        $row40 = mysqli_fetch_assoc($result40); 
                                        $nume_prenume = $row40['nume'] . " " . $row40['prenume'];
                                        $_SESSION['nume_prenume'] = $nume_prenume;
                                        $_SESSION['log_in'] = true;
                                        header("Location: index.php");
                                        exit();
                                    }
                                }
                            }
                        }
                    ?>

                </form>
            </div>
        </div>             
            
        <script src="script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </body>
</html>