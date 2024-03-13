<html>
    
    <head>
        
    <title>Admin suport capsule</title>
    <link rel="stylesheet" type="text/css" href="style_admin.css">
        <link rel="shortcut icon" href="Imagini/Nespresso.jpg" type="image/x-icon">

        
    </head>
    
    <body>
        <div class="mijloc">
            <div class="container">
                
                 <form action="" method="post" enctype="multipart/form-data">
                    <h3>Adaugati un produs</h3>
                    
                    <input type="text" placeholder="numele suportului" name="nume" ><br>
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
                        $pret = $_POST['pret'];
                        $stoc = $_POST['stoc'];
                        
                        
                        $caleapoza_posibila="Imagini_suport_capsule/".basename($_FILES["poza"]["name"]);
                        if (file_exists($caleapoza_posibila)) 
                        {
                            echo "Regretam dar un fisier cu acest nume exista deja! Alege alt nume";
                        } 
                        else
                        if ($_FILES['poza']['size']<=1000000000)
                        {


                            $caleapoza="Imagini_suport_capsule/".$_FILES['poza']['name'];
                            $sql1 = "SELECT * FROM `suport_de_capsule` WHERE `nume_suport` = '$nume'";
                            $rez1 = mysqli_query($id_con,$sql1);
                            if(mysqli_num_rows($rez1)==0)
                            {
                                if(is_uploaded_file($_FILES['poza']['tmp_name']))
                                {   ///daca s-a incarcat complet
                                move_uploaded_file($_FILES['poza']['tmp_name'],"Imagini_suport_capsule/".$_FILES['poza']['name']);     ///mutam fisierul temporar in fisierul imagini cu numele convenabil
                                }
                                echo("adaugat");
                                $sql2="INSERT INTO suport_de_capsule (`nume_suport`,`pret`,`stoc`,`imagine`) VALUES ('$nume','$pret','$stoc','$caleapoza');";
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
                    $sql3 = "SELECT `id_suport`, `nume_suport` FROM `suport_de_capsule` WHERE 1";
                    $rez = mysqli_query($id_con, $sql3);
                    while ($valori = mysqli_fetch_array($rez)) 
                    {
                        $id = $valori[0];
                        $nume = $valori[1];
                ?>
                            <option value="<?php echo("$id"); ?>"><?php 
                                echo ("$nume"); 
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
                        $sql4="SELECT`imagine` FROM suport_de_capsule WHERE id_suport='$id'";
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
                        $sql5="DELETE FROM suport_de_capsule WHERE `id_suport` = '$id'";
                        mysqli_query($id_con, $sql5);
                        echo("Suport de capsule stears");
                    }
                ?>

                <br>
                <a href="admin_welcome.php"><button>Inapoi</button></a>
            </div>
        </div>
    </body>
</html>