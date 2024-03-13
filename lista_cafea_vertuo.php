<?php
session_set_cookie_params(0);
    session_start();
?>
<html>
    
    
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="style_cafea_vertuo.css">
        <link rel="stylesheet" type="text/css" href="style_capsula.css">
        <title>Cafea</title>
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
                            include("liste.php");
                        ?> </div>
                    
                
                <br><br>
                <div class="mid">
                
                    <div class="info">
                        <div class="poza_originala">
                           <div class="scris">
                                <h1><b>CAPSULE DE CAFEA ORIGINALE</b></h1>
                                <p>Fiecare ceașacă de cafea Nespresso este neutra din punct de vedere al emisiilor de carbon.</p>
                               <p><b>Livrare Gratuită minimum 100 de lei.</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="butoane">
                        
                        <a href="lista_cafea_originala.php" style="color:#17171A;"><button ><img src="Imagini/capsula_originala.webp" height="40px" width="40px" style="vertical-align: -12px;"> Original </button></a>
                        
                        <button style="text-decoration: underline"><img src="Imagini/capsula_vertuo.webp" height="40px" width="40px" style="vertical-align: -12px;">Vertuo</button>
                    </div>
                    <br><br>
                    
                    <?php
                        include ('conectare_baza_de_date.php');
                        $sql="SELECT id_capsula FROM `capsule` WHERE 1";
                        $rez=mysqli_query($id_con, $sql);
                        if (mysqli_num_rows($rez)>0)
                        {
                            ?>
                    <div class="cafea">
                        <div class="barista-creation">
                            <div class="gradient">
                                BARISTA CREATIONS
                                <p style="font-size:17px; color:#17171A">Inspirate de creativitatea și expertiza celor mai pricepuți barista din întreaga lume, aceste capsule de cafea sunt special create pentru a preparara cu ușurință rețete de cafea acasă.</p>
                                <div class="grid-containerB">
                                        <?php
                                        $rez=mysqli_query($id_con, $sql);
                                        while($linie=mysqli_fetch_array($rez))
                                        {
                                            $id_capsula=$linie[0];
                                            $sql_cat="SELECT `nume_categorie`, `original` FROM `capsule` WHERE `id_capsula`= '$id_capsula' ";
                                            $rez_cat=mysqli_query($id_con, $sql_cat);
                                            $cat=mysqli_fetch_array($rez_cat);
                                            if ($cat[0]=="barista_creations" && $cat[1]==0) 
                                            {
                                                $sql2="SELECT `imagine`,`nume_capsula`,`descriere`,`mililitri`,`intensitate`,`pret`, `decofeinizata` FROM `capsule` WHERE `id_capsula` = '$id_capsula' ";
                                                $rez2=mysqli_query($id_con, $sql2);
                                                $valori=mysqli_fetch_array($rez2);
                                                $poza=$valori[0];
                                                $nume=$valori[1];
                                                $descriere=$valori[2];
                                                $mililitri=$valori[3];
                                                $intensitate=$valori[4];
                                                $pret=$valori[5];
                                                $decofeinizata=$valori[6];
                                                ?>
                                                <div class="capsula"> 
                                                    <a href="#"><img src="<?php echo("$poza")?>" width="150px"></a>
                                                    <div class="nume_scris">

                                                        <p class="nume"><?php echo ("$nume"); if($decofeinizata==1){ ?><br><span style="color:#AA3C24;"> DECAFFEINATO </span><?php }?></p>

                                                        <p class="descriere"><?php echo("$descriere");?></p>    

                                                        <span> <ion-icon name="cafe-outline" class="icon"></ion-icon> <?php echo("$mililitri")?> ml</span>
                                                        <?php
                                                        if($intensitate!=0)
                                                        {
                                                        ?>
                                                            <div class="intensitate">
                                                                Intensitate:<span><?php for($i=1; $i<=$intensitate; $i++) {echo("|");}?></span>   <?php echo("$intensitate")?><span class="fara_culoare"><?php for($i=$intensitate+1; $i<=13; $i++) {echo("|");}?></span>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>

                                                    <div class="pret_cutii">
                                                        <p class="pret"><?php echo number_format($pret, 2);?> RON</p>
                                                        <p class="cutie">1 cutie (10 capsule) <br>Pret capsula: <?php echo number_format($pret/10, 2);?> RON</p>

                                                    </div>

                                                    <button>ADĂUGAȚI ÎN COȘ</button>

                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>

                                        </div>
                                
                            </div>
                            
                        </div>

                        <div class="inspiratione-italiana">
                            <div class="gradient">  
                                <span>DOUBLE ESPRESSO</span>
                                <p style="font-size:17px; color:#fff">Alegeți un Double Espresso de 80 ml potrivit ocaziei alese, din amestecuri intense și îndrăznețe, pentru o experiență autentică a unui espresso.</p>
                                <div class="grid-containerI">  <!-- italiana=double_espresso -->
                                                                            <?php
                                        $rez=mysqli_query($id_con, $sql);
                                        while($linie=mysqli_fetch_array($rez))
                                        {
                                            $id_capsula=$linie[0];
                                            $sql_cat="SELECT `nume_categorie`, `original` FROM `capsule` WHERE `id_capsula`= '$id_capsula' ";
                                            $rez_cat=mysqli_query($id_con, $sql_cat);
                                            $cat=mysqli_fetch_array($rez_cat);
                                            if ($cat[0]=="double_espresso" && $cat[1]==0) 
                                            {
                                                $sql2="SELECT `imagine`,`nume_capsula`,`descriere`,`mililitri`,`intensitate`,`pret`, `decofeinizata` FROM `capsule` WHERE `id_capsula` = '$id_capsula' ";
                                                $rez2=mysqli_query($id_con, $sql2);
                                                $valori=mysqli_fetch_array($rez2);
                                                $poza=$valori[0];
                                                $nume=$valori[1];
                                                $descriere=$valori[2];
                                                $mililitri=$valori[3];
                                                $intensitate=$valori[4];
                                                $pret=$valori[5];
                                                $decofeinizata=$valori[6];
                                                ?>
                                                <div class="capsula"> 
                                                    <a href="#"><img src="<?php echo("$poza")?>" width="150px"></a>
                                                    <div class="nume_scris">

                                                        <p class="nume"><?php echo ("$nume"); if($decofeinizata==1){ ?><br><span style="color:#AA3C24;"> DECAFFEINATO </span><?php }?></p>

                                                        <p class="descriere"><?php echo("$descriere");?></p>    

                                                        <span> <ion-icon name="cafe-outline" class="icon"></ion-icon> <?php echo("$mililitri")?> ml</span>
                                                        <?php
                                                        if($intensitate!=0)
                                                        {
                                                        ?>
                                                            <div class="intensitate">
                                                                Intensitate:<span><?php for($i=1; $i<=$intensitate; $i++) {echo("|");}?></span>   <?php echo("$intensitate")?><span class="fara_culoare"><?php for($i=$intensitate+1; $i<=13; $i++) {echo("|");}?></span>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>

                                                    <div class="pret_cutii">
                                                        <p class="pret"><?php echo number_format($pret, 2);?> RON</p>
                                                        <p class="cutie">1 cutie (10 capsule) <br>Pret capsula: <?php echo number_format($pret/10, 2);?> RON</p>

                                                    </div>

                                                    <button>ADĂUGAȚI ÎN COȘ</button>

                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>

                        <div class="world-explorations">
                            <div class="gradient"> 
                                <span>GRAN LUNGO</span>
                                 <p style="font-size:17px; color:#fff">Prelungiți momentele petrecute la o cafea cu un Grand Lungo. Bucurați-vă de experiența acestei game de cafea din sortimente îndrăznețe și savurați pentru mai mult timp fiecare ceașcă.</p>
                                <div class="grid-containerW">  <!-- word=gran_lungo -->
                                        <?php
                                        $rez=mysqli_query($id_con, $sql);
                                        while($linie=mysqli_fetch_array($rez))
                                        {
                                            $id_capsula=$linie[0];
                                            $sql_cat="SELECT `nume_categorie`, `original` FROM `capsule` WHERE `id_capsula`= '$id_capsula' ";
                                            $rez_cat=mysqli_query($id_con, $sql_cat);
                                            $cat=mysqli_fetch_array($rez_cat);
                                            if ($cat[0]=="gran_lungo" && $cat[1]==0) 
                                            {
                                                $sql2="SELECT `imagine`,`nume_capsula`,`descriere`,`mililitri`,`intensitate`,`pret`, `decofeinizata` FROM `capsule` WHERE `id_capsula` = '$id_capsula' ";
                                                $rez2=mysqli_query($id_con, $sql2);
                                                $valori=mysqli_fetch_array($rez2);
                                                $poza=$valori[0];
                                                $nume=$valori[1];
                                                $descriere=$valori[2];
                                                $mililitri=$valori[3];
                                                $intensitate=$valori[4];
                                                $pret=$valori[5];
                                                $decofeinizata=$valori[6];
                                                ?>
                                                <div class="capsula"> 
                                                    <a href="#"><img src="<?php echo("$poza")?>" width="150px"></a>
                                                    <div class="nume_scris">

                                                        <p class="nume"><?php echo ("$nume"); if($decofeinizata==1){ ?><br><span style="color:#AA3C24;"> DECAFFEINATO </span><?php }?></p>

                                                        <p class="descriere"><?php echo("$descriere");?></p>    

                                                        <span> <ion-icon name="cafe-outline" class="icon"></ion-icon> <?php echo("$mililitri")?> ml</span>
                                                        <?php
                                                        if($intensitate!=0)
                                                        {
                                                        ?>
                                                            <div class="intensitate">
                                                                Intensitate:<span><?php for($i=1; $i<=$intensitate; $i++) {echo("|");}?></span>   <?php echo("$intensitate")?><span class="fara_culoare"><?php for($i=$intensitate+1; $i<=13; $i++) {echo("|");}?></span>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>

                                                    <div class="pret_cutii">
                                                        <p class="pret"><?php echo number_format($pret, 2);?> RON</p>
                                                        <p class="cutie">1 cutie (10 capsule) <br>Pret capsula: <?php echo number_format($pret/10, 2);?> RON</p>

                                                    </div>

                                                    <button>ADĂUGAȚI ÎN COȘ</button>

                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </div>

                        </div>

                        <div class="master-origins">
                            <div class="gradient">
                                <span>MASTER ORIGINS</span>
                                <p style="font-size:17px; color:#fff">Caracteristicile acestor sortimente de cafea sunt specifice regiunii din care provin, dar și metodelor de procesare ale fermierilor. Create de producători locali, perfecţionate de artizani și inspirate de locuri extraordinare de origine.</p>
                                <div class="grid-containerM">  
                                        <?php
                                        $rez=mysqli_query($id_con, $sql);
                                        while($linie=mysqli_fetch_array($rez))
                                        {
                                            $id_capsula=$linie[0];
                                            $sql_cat="SELECT `nume_categorie`, `original` FROM `capsule` WHERE `id_capsula`= '$id_capsula' ";
                                            $rez_cat=mysqli_query($id_con, $sql_cat);
                                            $cat=mysqli_fetch_array($rez_cat);
                                            if ($cat[0]=="master_origins" && $cat[1]==0) 
                                            {
                                                $sql2="SELECT `imagine`,`nume_capsula`,`descriere`,`mililitri`,`intensitate`,`pret`, `decofeinizata` FROM `capsule` WHERE `id_capsula` = '$id_capsula' ";
                                                $rez2=mysqli_query($id_con, $sql2);
                                                $valori=mysqli_fetch_array($rez2);
                                                $poza=$valori[0];
                                                $nume=$valori[1];
                                                $descriere=$valori[2];
                                                $mililitri=$valori[3];
                                                $intensitate=$valori[4];
                                                $pret=$valori[5];
                                                $decofeinizata=$valori[6];
                                                ?>
                                                <div class="capsula"> 
                                                    <a href="#"><img src="<?php echo("$poza")?>" width="150px"></a>
                                                    <div class="nume_scris">

                                                        <p class="nume"><?php echo ("$nume"); if($decofeinizata==1){ ?><br><span style="color:#AA3C24;"> DECAFFEINATO </span><?php }?></p>

                                                        <p class="descriere"><?php echo("$descriere");?></p>    

                                                        <span> <ion-icon name="cafe-outline" class="icon"></ion-icon> <?php echo("$mililitri")?> ml</span>
                                                        <?php
                                                        if($intensitate!=0)
                                                        {
                                                        ?>
                                                            <div class="intensitate">
                                                                Intensitate:<span><?php for($i=1; $i<=$intensitate; $i++) {echo("|");}?></span>   <?php echo("$intensitate")?><span class="fara_culoare"><?php for($i=$intensitate+1; $i<=13; $i++) {echo("|");}?></span>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>

                                                    <div class="pret_cutii">
                                                        <p class="pret"><?php echo number_format($pret, 2);?> RON</p>
                                                        <p class="cutie">1 cutie (10 capsule) <br>Pret capsula: <?php echo number_format($pret/10, 2);?> RON</p>

                                                    </div>

                                                    <button>ADĂUGAȚI ÎN COȘ</button>

                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </div>

                        </div>

                        <div class="espresso">
                            <div class="gradient">
                                <span> ESPRESSO </span>
                                 <p style="font-size:17px; color:white">Cu diferite intensități și gusturi, bucurați-vă de momentele la cafea cu sortimentele Espresso Vertuo potrivite pentru orice ocazie, care vă vor cuceri toate simțurile.</p>
                                <div class="grid-containerE">  
                                        <?php
                                        $rez=mysqli_query($id_con, $sql);
                                        while($linie=mysqli_fetch_array($rez))
                                        {
                                            $id_capsula=$linie[0];
                                            $sql_cat="SELECT `nume_categorie`, `original` FROM `capsule` WHERE `id_capsula`= '$id_capsula' ";
                                            $rez_cat=mysqli_query($id_con, $sql_cat);
                                            $cat=mysqli_fetch_array($rez_cat);
                                            if ($cat[0]=="espresso" && $cat[1]==0) 
                                            {
                                                $sql2="SELECT `imagine`,`nume_capsula`,`descriere`,`mililitri`,`intensitate`,`pret`, `decofeinizata` FROM `capsule` WHERE `id_capsula` = '$id_capsula' ";
                                                $rez2=mysqli_query($id_con, $sql2);
                                                $valori=mysqli_fetch_array($rez2);
                                                $poza=$valori[0];
                                                $nume=$valori[1];
                                                $descriere=$valori[2];
                                                $mililitri=$valori[3];
                                                $intensitate=$valori[4];
                                                $pret=$valori[5];
                                                $decofeinizata=$valori[6];
                                                ?>
                                                <div class="capsula"> 
                                                    <a href="#"><img src="<?php echo("$poza")?>" width="150px"></a>
                                                    <div class="nume_scris">

                                                        <p class="nume"><?php echo ("$nume"); if($decofeinizata==1){ ?><br><span style="color:#AA3C24;"> DECAFFEINATO </span><?php }?></p>

                                                        <p class="descriere"><?php echo("$descriere");?></p>    

                                                        <span> <ion-icon name="cafe-outline" class="icon"></ion-icon> <?php echo("$mililitri")?> ml</span>
                                                        <?php
                                                        if($intensitate!=0)
                                                        {
                                                        ?>
                                                            <div class="intensitate">
                                                                Intensitate:<span><?php for($i=1; $i<=$intensitate; $i++) {echo("|");}?></span>   <?php echo("$intensitate")?><span class="fara_culoare"><?php for($i=$intensitate+1; $i<=13; $i++) {echo("|");}?></span>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>

                                                    <div class="pret_cutii">
                                                        <p class="pret"><?php echo number_format($pret, 2);?> RON</p>
                                                        <p class="cutie">1 cutie (10 capsule) <br>Pret capsula: <?php echo number_format($pret/10, 2);?> RON</p>

                                                    </div>

                                                    <button>ADĂUGAȚI ÎN COȘ</button>

                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </div>

                        </div>
                    </div>
                        <?php
                        }
                        else
                        {
                            echo("Nu avem produse de afisat");    
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