<?php
session_set_cookie_params(0);
    session_start();
?>

<html>
    
    
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="style_espressoare.css">
        <title>Espressoare</title>
        <link rel="shortcut icon" href="Imagini/Nespresso.jpg" type="image/x-icon">
        
    </head>
    <body>
            <div id="tot">
                
                <div id="antet"> 

                    <div id="logo"> <a href="index.php"> <img src="Imagini/Nespresso-Logo.png" width="150px" height="30px"> </a> </div>
                    
                   <div class = "de_lucrat_php">
                        <?php
     
                        
                         if (isset($_SESSION['log_in']) && $_SESSION['log_in'] == true) {
                            // The key is set and its value is true
                            // Display the logged-in content
                            ?>
                            <button> Salut, <?php echo($_SESSION['nume_prenume']) ?> </button>
                            <a href="delogare.php"><button> Log Out </button></a>
                            <?php
                        } else {
                            // The key is not set or its value is not true
                            // Display the login form or a message
                            ?>
                            <a href="pagina_conectare.php"> <button class="btnLogin_popup" > Log in </button> </a>
                            <?php
                        }
                        ?>

                        
                    </div>
                                
                </div>   
                <div id="masca_sub_divul_mobil"> </div>
                <div id="navigation_bar"><?php
                            include("liste.php");?> 
                </div>
                    
                
                <div class="mid">
                    
                    <div class="gradient">
                        <div class="scris">
                           <h1 style="font-size:37px">APARATE DE CAFEA ORIGINAL</h1>
                            <p> <b>Ofertă specială de primăvară</b> <br> 25% reducere la espressoare la comenzile de cafea</p>
                            <p>Livrare Gratuită la orice aparat achiziționat.</p>
                        </div>
                    </div>
                    <br>
                    <div class="butoane">
                        
                        <button style="text-decoration: underline"><img src="Imagini/espressor_original2.webp"  width="100%" style="vertical-align: -12px;"><br> Original </button>
                        
                        <a href="espressoare_vertuo.php" style="color:#17171A;"><button><img src="Imagini/espressor_vertou2.webp" width="100%" style="vertical-align: -12px;"><br> Vertuo</button></a>
                    </div>
                    <br><br><br>
                    
                    <?php
                    include ('conectare_baza_de_date.php');
                    $sql="SELECT * FROM `espressoare` WHERE 1";
                    $rez=mysqli_query($id_con, $sql);
                    if (mysqli_num_rows($rez)>0)
                    {
                    ?>
                    <div class="container">
                        
                        
                        <?php
                            $sql2="SELECT * FROM `espressoare` WHERE `original`= 1";
                            $rez2=mysqli_query($id_con, $sql2);
                        
                        ?>
                        <div class="nr_espresoare">
                            <?php 
                                if(mysqli_num_rows($rez2)==1)
                                {
                                    echo( mysqli_num_rows($rez2));
                                    ?>
                                    ESPRESSOR
                                    <?php
                                }
                                else 
                                {
                                echo( mysqli_num_rows($rez2));
                                ?>
                                    ESPRESSOARE
                                <?php
                                }
                            ?> 
                        
                        </div>
                        <br>       
                        
                        <?php
                            while($linie=mysqli_fetch_array($rez))
                            {
                                if ($linie[1]==1)
                                {
                                
                                $poza=$linie[12];
                                $nume=$linie[2];
                                $descriere=$linie[4];
                                $pret=$linie[10];
                                ?>
                                <a href="#"><div class="espressor">


                                    <div class="poza"><img src="<?php echo("$poza");?>"></div>

                                    <div class="info">
                                        <p style="font-size:20px; color:black; letter-spacing: 2px;"> <b><?php echo("$nume");?></b> </p><br>
                                        <p style=" line-height: 20px; color:#656565"><?php echo("$descriere");?></p><br>
                                        <p><span style="font-size:20px; vertical-align: -5px;"><ion-icon name="car-outline"></ion-icon></span> <span style="color:#3D8705">Livrare gratuită</span></p>
                                        <p><span style="font-size:20px; vertical-align: -5px;"><ion-icon name="document-outline"></ion-icon></span> <span style="color:#3D8705">Garanție 2 ani</span></p>
                                        <p><span style="font-size:20px; vertical-align: -5px;"><ion-icon name="cafe-outline"></ion-icon></span> <span style="color:#3D8705">Set cafea inclus</span></p>
                                        <br><br>
                                    </div>

                                    <div class="pret">
                                        <div class="ceva">
                                            <p><?php echo(number_format($pret,2));?> <br> <span style="color:#656565">la achizitaia de 100 de capsule</span></p>
                                        </div>

                                          <button>Comanda acum</button>
                                    </div>
                                </div></a>
                            <?php
                                }
                            }
                        ?>
   
                        
                        
                    </div>
                    <?php
                    }
                    else 
                    {
                        echo("nu avem produse");
                    }
                    
                    ?>
                    
                    
                </div>
                
                <div id="subsol">
                
                    <div id="plati">
                        <p>100% plati securizate</p>
                        <img src="Imagini/mastercard.jpg" width="10%">
                        <img src="Imagini/visa.png" width="10%">
                        <img src="Imagini/apple_pay.png" width="10%">
                        <img src="Imagini/google_pay.jpg" width="10%">
                    </div>
                    
                    <div id="about_us">
                        
                        <?php
                            include("lista_about_us.php");
                        ?>
                    </div>
                    
                </div>
                
            </div>
           
        
        
        <script src="script_capsule.js"></script>
         <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    </body>
</html>