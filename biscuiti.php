<?php
session_set_cookie_params(0);
    session_start();
?>
<html>
    
    
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="style_accesorii.css">
        <title>Accesorii</title>
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
                           <h1 style="font-size:37px">ACCESORII NESPRESSO</h1>
                            <p>Livrare Gratuită min. 100 lei, în 2 zile lucrătoare.</p>
                        </div>
                    </div>
                    <br>
                    
                    <?php
                    include ('conectare_baza_de_date.php');
                    $sql="SELECT * FROM `biscuiti` WHERE 1";
                    $rez=mysqli_query($id_con, $sql);
                    if (mysqli_num_rows($rez)>0)
                    {
                    ?>
                    <div class="container">
                        
                        <div class="numar">
                            <?php 
                                if(mysqli_num_rows($rez)==1)
                                {
                                    echo( mysqli_num_rows($rez));
                                    ?>
                                    CUTIE DE BISCUIȚI
                                    <?php
                                }
                                else 
                                {
                                echo( mysqli_num_rows($rez));
                                ?>
                                    CUTII DE BISCUIȚI
                                <?php
                                }
                            ?> 
                            
                        </div>
                        
                        <br><br>
                        
                        
                        <?php
                        while($linie=mysqli_fetch_array($rez))
                        {
                            $poza=$linie[5];
                            $nume=$linie[1];
                            $pret=$linie[2];
                        ?>
                        <div class="accesorii">
                            
                            <div class="poza"><img src="<?php echo("$poza");?>"></div>
                            <div class="info"><?php echo("$nume");?></div>
                            <div class="pret">
                                <p class="ceva"> <?php echo(number_format($pret,2));?> RON <button> <span style="color:#fff; vertical-align: -5px; font-size: 30px;"> <ion-icon name="bag-remove-outline"></ion-icon> </span>ADĂUGAȚI ÎN COȘ <span style="font-size:30px;vertical-align: -4px;"> + </span></button></p>
                            </div>
                            
                        </div>
                        <?php
                        }
                        ?>
                        
                    </div>
                    <?php
                    }
                    else 
                    {
                        echo("NU AVEM PRODUSE MOMENTAN");
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