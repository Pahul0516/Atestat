<html>
    
    <head>
        
    <title>Admin espressoare</title>
    <link rel="stylesheet" type="text/css" href="style_admin.css">
        <link rel="shortcut icon" href="Imagini/Nespresso.jpg" type="image/x-icon">

        
    </head>
    
    <body>
        <div class="mijloc">
            <div class="container">
                
                 <form action="" method="post" enctype="multipart/form-data">
                    <h3>Adaugati un produs</h3>
                    
                    <input type="text" placeholder="numele espressorului" name="nume" ><br>
                    
                    
       
                    <label>Categorie:</label>
                    <input type="radio" name="categorie" value="1"> <label>Original</label>
                    <input type="radio" name="categorie" value="0"> <label>Vertuo</label><br>
                    <textarea placeholder="O scurta descriere" name="descriere" ></textarea><br>
                    <input type="number" placeholder="Pret" name="pret" step="0.01"><br>
                    <input type="number" placeholder="Stoc" name="stoc" ><br>
                    <lable>Imagine:</lable><input type="file" name="poza" ><br>
                    
                    <input type="submit" value="Adaugati" name="buton"><br>
                     
                </form>
                
            
                <?php
                    include("conectare_baza_de_date.php");
                    if(isset($_POST['buton'])) 
                    {
                        $nume = $_POST['nume'];
                        $original_vertuo = $_POST['categorie'];
                        $descriere = $_POST['descriere'];
                        $pret = $_POST['pret'];
                        $stoc = $_POST['stoc'];
                        
                        
                        $caleapoza_posibila="Imagini_espressoare/".basename($_FILES["poza"]["name"]);
                        if (file_exists($caleapoza_posibila)) 
                        {
                            echo "Regretam dar un fisier cu acest nume exista deja! Alege alt nume";
                        } 
                        else
                        if ($_FILES['poza']['size']<=1000000000)
                        {


                            $caleapoza="Imagini_espressoare/".$_FILES['poza']['name'];
                            $sql1 = "SELECT * FROM `espressoare` WHERE `original`= '$original_vertuo' && `nume_espressor` = '$nume'";
                            $rez1 = mysqli_query($id_con,$sql1);
                            if(mysqli_num_rows($rez1)==0)
                            {
                                if(is_uploaded_file($_FILES['poza']['tmp_name']))
                                {   ///daca s-a incarcat complet
                                move_uploaded_file($_FILES['poza']['tmp_name'],"Imagini_espressoare/".$_FILES['poza']['name']);     ///mutam fisierul temporar in fisierul imagini cu numele convenabil
                                }
                                echo("adaugat");
                                $sql2="INSERT INTO espressoare (`nume_espressor`,`original`,`descriere`,`pret`,`stoc`,`imagine_espressor`) VALUES ('$nume','$original_vertuo','$descriere','$pret','$stoc','$caleapoza');";
                                mysqli_query($id_con,$sql2);

                            }
                            else 
                            {
                                echo("produs existent");
                            }  
                        }
                        else
                        {
                            echo("Alegeti un fisier a carui marime sa fie de cel mult 1000 octeti");

                        }
 

                    }
                
                ?>
                
                
                
                <p>Ce doresti sa stergi?</p>
                
            <form method="post"> 
                <select name="sterge">
                 <?php
                    $sql3 = "SELECT `id_espressor`, `original`, `nume_espressor` FROM `espressoare` WHERE 1";
                    $rez = mysqli_query($id_con, $sql3);
                    while ($valori = mysqli_fetch_array($rez)) 
                    {
                        $id = $valori[0];
                        $original = $valori[1];
                        $nume = $valori[2];
                ?>
                            <option value="<?php echo("$id"); ?>"><?php 
                                if ($original==1)
                                {
                                    $afis="Original";   
                                }
                                else
                                {
                                    $afis="Vertuo";
                                }
                                echo ("$nume $afis"); 
                                ?>
                            </option>

                <?php
                    }
                ?>
                </select>
                <input type="submit" name="btn" value="Sterge produs">
            </form>
                <?php
                    if(isset($_POST['btn'])) 
                    {
                        $id=$_POST['sterge'];
                        $sql4="SELECT`imagine_espressor` FROM espressoare WHERE id_espressor='$id'";
                        $rez4=mysqli_query($id_con, $sql4);
                        $valori=mysqli_fetch_array($rez4);
                        
                        $photoPath=$valori[0];
                        if (file_exists($photoPath)) 
                        {
                            if (unlink($photoPath)) {
                                echo "";
                            } else {
                                echo "Failed to delete the photo.";
                            }
                        } else {
                            echo "The photo does not exist.";
                        }
                        $sql5="DELETE FROM espressoare WHERE `id_espressor` = '$id'";
                        mysqli_query($id_con, $sql5);
                        echo("Espressor stears");
                    }
                ?>
                
                <br>
                
                <a href="admin_welcome.php"><button>Inapoi</button></a>
            </div>
        </div>
    </body>
</html>