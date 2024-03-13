<html>
    
    <head>
        
    <title>Admin capsule</title>
    <link rel="stylesheet" type="text/css" href="style_admin.css">
        <link rel="shortcut icon" href="Imagini/Nespresso.jpg" type="image/x-icon">

        
    </head>
    
    <body>
        <div class="mijloc">
            <div class="container">
                
                 <form action="" method="post" enctype="multipart/form-data">
                    <h3>Adaugati un produs</h3>
                    
                    <input type="text" placeholder="numele capsulei" name="nume" ><br>
                    
                    
       
                    <label for="coffee-type">Select Coffee Type:</label>
                    <select name="coffee-type" id="coffee-type" >
                        <option value="">Select Type</option>
                        <option value="original">Original</option>
                        <option value="vertuo">Vertuo</option>
                    </select><br>

                    <label for="coffee-subtype">Select Coffee Subtype:</label>
                    <select name="coffee-subtype" id="coffee-subtype">
                        <option value="">Select Subtype</option>
                    </select><br>
                    <textarea placeholder="O scurta descriere" name="descriere" ></textarea><br>
                    <input type="number" placeholder="Mililitri" name="mililitri" ><br>
                    
                    <label for="intensitate">Intensitate:</label>
                    <select name="intensitate">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                    </select><br>
                    <input type="checkbox" name="decofeinizata" value="1"><label> Decofeinizata</label><br>
                    <input type="number" placeholder="Pret" name="pret" step="0.01"><br>
                    <input type="number" placeholder="Stoc" name="stoc" ><br>
                    <input type="number" placeholder="Termen valabilitate in zile" name="termen_val"><br>
                    <lable>Data fabricatiei:</lable><input type="date" name="data_fab"><br>
                    <lable>Imagine:</lable><input type="file" name="poza" ><br>
                    
                    <input type="submit" value="Adaugati" name="buton"><br>
                    
            </form>
                
            
                <?php
                    include("conectare_baza_de_date.php");
                    if(isset($_POST['buton'])) 
                    {
                        $nume = $_POST['nume'];
                        $original_vertuo = $_POST['coffee-type'];
                        $categorie = $_POST['coffee-subtype'];
                        $descriere = $_POST['descriere'];
                        $mililitri = $_POST['mililitri'];
                        $intensitate = $_POST['intensitate'];
                        $pret = $_POST['pret'];
                        $stoc = $_POST['stoc'];
                        $termen_val = $_POST['termen_val'];
                        $data_fab = $_POST['data_fab'];
                        if (isset($_POST['decofeinizata'])) 
                        {
                            // The checkbox is selected
                            // Process the checkbox value
                            $decofeinizata = $_POST['decofeinizata'];
                            $decofeinizata = 1;
                            // Rest of your code
                        } else {
                            // The checkbox is not selected
                            // Handle the case when the checkbox is not checked
                            $decofeinizata = 0;
                        }

                        
                        
                        $caleapoza_posibila="Imagini_capsule/".basename($_FILES["poza"]["name"]);
                        if (file_exists($caleapoza_posibila)) 
                        {
                            echo "Regretam dar un fisier cu acest nume exista deja! Alege alt nume";
                        } 
                        else
                        if ($_FILES['poza']['size']<=1000000000)
                        {


                            $caleapoza="Imagini_capsule/".$_FILES['poza']['name'];
                            if($original_vertuo=="original")
                                $original_vertuo = 1;
                            else 
                                $original_vertuo = 0;

                            $sql1 = "SELECT * FROM `capsule` WHERE `original`= '$original_vertuo' && `nume_categorie` = '$categorie' && `nume_capsula` = '$nume' && `decofeinizata` = '$decofeinizata'";
                            $rez1 = mysqli_query($id_con,$sql1);
                            if(mysqli_num_rows($rez1)==0)
                            {
                                if(is_uploaded_file($_FILES['poza']['tmp_name']))
                                {   ///daca s-a incarcat complet
                                move_uploaded_file($_FILES['poza']['tmp_name'],"Imagini_capsule/".$_FILES['poza']['name']);     ///mutam fisierul temporar in fisierul imagini cu numele convenabil
                                }
                                echo("adaugat");
                                $sql2="INSERT INTO `capsule` (`nume_capsula`, `original`, `nume_categorie`, `descriere`, `mililitri`, `intensitate`, `pret`, `stoc`, `termen_valabilitate`, `data_fabricatiei`, `imagine`, `decofeinizata`) VALUES ('$nume', '$original_vertuo', '$categorie', '$descriere', '$mililitri', '$intensitate', '$pret', '$stoc', '$termen_val', '$data_fab', '$caleapoza', '$decofeinizata');";
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
                    $sql3 = "SELECT `id_capsula`, `nume_categorie`, `original`, `nume_capsula`, `decofeinizata` FROM `capsule` WHERE 1";
                    $rez = mysqli_query($id_con, $sql3);
                    while ($valori = mysqli_fetch_array($rez)) 
                    {
                        $id = $valori[0];
                        $nume_categorie = $valori[1];
                        $original = $valori[2];
                        $nume = $valori[3];
                        $decof = $valori[4];
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

                                if ($decof==1)
                                {
                                    $afis2="Decofeinizata";   
                                }
                                else
                                {
                                    $afis2=" ";
                                }

                                echo ("$nume $nume_categorie $afis $afis2"); 
                                ?>
                            </option>

                <?php
                    }
                ?>
                </select><br>
                <input type="submit" name="btn" value="Sterge produs">
            </form>
                <?php
                    if(isset($_POST['btn'])) 
                    {
                        $id=$_POST['sterge'];
                        $sql4="SELECT`imagine` FROM capsule WHERE id_capsula='$id'";
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
                        $sql5="DELETE FROM capsule WHERE `id_capsula` = '$id'";
                        mysqli_query($id_con, $sql5);
                        echo("Capsula stearsa");
                    }
                ?><br>
                <a href="admin_welcome.php"><button>Inapoi</button></a>
            </div>
            
            
             
            
        </div>
    </body>
    <script>
          // Get references to the select elements
          const coffeeTypeSelect = document.getElementById('coffee-type');
          const coffeeSubtypeSelect = document.getElementById('coffee-subtype');

          // Define the available subtypes based on coffee types
          const subtypes = {
            original: [
              { value: 'barista_creations', label: 'Barista Creations' },
              { value: 'inspirazione_italiana', label: 'Inspirazione Italiana'},
              { value: 'world_explorations', label: 'World Explorations' },
              { value: 'master_origins', label: 'Master Origins' },
              { value: 'espresso', label: 'Espresso' }
            ],
            vertuo: [
              { value: 'barista_creations', label: 'Barista Creation' },
              { value: 'double_espresso', label: 'Double Espresso' },
              { value: 'gran_lungo', label: 'Gran Lungo' },
              { value: 'master_origins', label: 'Master Origins' },
              { value: 'espresso', label: 'Espresso' }
            ]
          };

          // Function to update the subtype options based on the selected type
          function updateSubtypeOptions() {
            const selectedType = coffeeTypeSelect.value;
            const subtypeOptions = subtypes[selectedType] || [];

            // Clear existing options
            coffeeSubtypeSelect.innerHTML = '';

            // Add new options
            subtypeOptions.forEach(option => {
              const { value, label } = option;
              const optionElement = document.createElement('option');
              optionElement.value = value;
              optionElement.textContent = label;
              coffeeSubtypeSelect.appendChild(optionElement);
            });
          }

          // Event listener to trigger the update when the type selection changes
          coffeeTypeSelect.addEventListener('change', updateSubtypeOptions);

          // Initial update of subtype options
          updateSubtypeOptions();
    </script>
</html>