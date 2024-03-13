<?php
$sessionLifetime = 0; // 1 hour
ini_set('session.gc_maxlifetime', $sessionLifetime);
    session_start(); 
?>

<html>
    
    
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Nespresso</title>
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
                            <a href="delogare.php"><button>Log Out</button></a>
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
                            include("liste.php");
                        ?> </div>

                <div id="gradient"> 
                    <div id="imagine1"><img src="Imagini/Espressor1.png" width="400px" height="400px"> </div>
                    <div id="info">
                        
                        <p style="font-size: 14px;font-weight: 600; color:#262626">CAPSULE DE CAFEA, APARATE DE CAFEA ORIGINALE NESPRESSO</p>
                        
                            <br>
                        
                        <p style="font-size: 29px;font-weight: bold; color:#1A1A1A">PÂNĂ LA 30% REDUCERE LA ESPRESSOARE</p>
                        
                            
                        
                        <p style="font-size: 12px; line-height: 1.5; color:#3F3F3F">la comenzile de capsule de cafea.<br>Livrarea gratuita</p>  
                        
                        <br>
                        <a href="espressoare_original.php">
                            <div id="buton_espressor"> ALEGEȚI ESPRESSOR  </div>
                        </a>
                    
                    </div>
                    <div id="imagine2"><img src="Imagini/Espressor2.png" width="500px" height="400px"></div>
                </div>

                <div id="optiuni">
                    
                    <div id="text">DESCOPERIȚI TOATE&nbsp;<b>PRODUSELE NESPRESSO</b></div>
                    
                    <div id="De_cumaprat">
                        <a href="espressoare_original.php">
                            <div id="sub_catogorie1">

                                <p style="font-weight: bold; font-size: 25px; color:#262626">ESPRESSOARE</p>
                                <p style="color:#3F3F3F">Beneficiați de Oferte speciale le espressoarele <b>Original</b> & <b>Vertuo</b></p>
                                <div id='buton1'>COMANDAȚI ESPRESSOARE</div>
                                <div id=poze><img src="Imagini/Optiune1.webp" width="133%"></div>

                            </div>
                        </a>
                        <a href="lista_cafea_originala.php">
                            <div id="sub_catogorie1">

                                <p style="font-weight: bold; font-size: 25px; color:#262626">CAPSULE CAFEA</p>
                                <p style="color:#3F3F3F">Descoperiți toate capsulele de cafea Nespresso <b>Original</b> & <b>Vertuo</b></p>
                                <div id='buton1'>COMANDAȚI CAPSULE</div>
                                <div id=poze><img src="Imagini/Optiune2.webp" width="133%"></div>


                            </div>
                        </a>
                        <a href="suport_capsule.php">
                            <div id="sub_catogorie1">

                                <p style="font-weight: bold; font-size: 25px; color:#262626">ACCESORII</p>
                                <p style="color:#3F3F3F">Comandați accesorii cu <b>10% reducere</b>pentru cei care au cont la noi</p>
                                <div id='buton1'>COMANDAȚI ACCESORII</div>
                                <div id=poze><img src="Imagini/Optiune3.webp" width="133%"></div>

                            </div>
                        </a>
                    </div>
                    
                    <div id="informatii">
                        <div id="sub_catogorie2">
                            <p style="font-size:30px; color:#262626"><b>DESCARCĂ APLICAȚIA MOBILA</b> NESPRESSO</p>
                            <p style="font-size:17px; color:#3F3F3F">Utilizați aplicația Nespresso pentru a comanda sortimentele preferate de cafea, localizați cel mai apropiat Boutique și descoperiți ofertele exclusive.</p>
                            <a href="https://play.google.com/store/apps/details?id=com.nespresso.activities">
                                <div id="buton_espressor">DESCĂRCAȚI APLICAȚIA</div>
                            </a>
                            <br>
                            <img src="Imagini/imagine_aplicatie.jpg" width="97%">
                            
                        </div>
                        <div id="sub_catogorie2">
                            <p style="font-size:30px; color:#262626"><b>RE-RE-RECICLAȚI CAPSULELE</b> FOLOSITE</p>
                            <p style="font-size:17px; color:#3F3F3F"> Capsulele Nespresso reciclate revin in circuitul de utilizare al aluminiului, iar zațul de cafea este utilizat pentru a crea compost bogat în nutrienți sau energie verde</p>
                            <a href="https://www.nespresso.com/ro/ro/reciclare-capsule-nespresso">
                                <div id="buton_espressor">ÎNCEPEȚI RECICLAREA</div>
                            </a>
                            <br>
                            <img src="Imagini/Capsule.jpg" width="97%">
                        </div>
                    </div>
                    
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
           
    </body>
</html>