<?php 
    session_start();
    
     define('UPLOADPATH', '../fichiers/'); 
    include("includes/entete.php");
    

    if(isset($_POST['submit'])){
        
            $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
        
            extract($_POST);
            
            $id_prof=$_SESSION['id_professeur'];
            $alias=$_POST['alias'];
            $cle=$_POST['cle'];
            $nom_fichier = $_FILES['fichier']['name'];
            $chemin=time().$nom_fichier;
            $destination =UPLOADPATH.time().$nom_fichier;
            $date=date('d/m/y h:m');
            
            $sql="insert into fichiers values (0,'$id_prof','$alias','$cle','$date','$chemin')";
            $resultat=mysqli_query($bdd,$sql);
        
            $move=move_uploaded_file($_FILES['fichier']['tmp_name'],$destination);
            
        
            if( $resultat && $move ){                
                    echo "L'envoi a bien été effectué !<br>";
                    echo "le nom du fichier est : ".$alias." !<br>";   
                    }else "une erreur dans upload fichier";

        }

?>




<br>
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" name="formulaire" id="formulaire" enctype="multipart/form-data" align='center'>
    <div class="form-group row">
    <label for="alias" class="col-sm-4 col-form-label"> Nom du cours-filière-:</label>
    <div class="col-sm-5">
      <input type="text" name="alias" class="form-control" id="alias" required>
        </div>
    </div>
    <div class="form-group row">
    <label for="cle" class="col-sm-4 col-form-label"> Cle du cours :</label>
    <div class="col-sm-5">
      <input type="text" name="cle" class="form-control" id="cle" required>
        </div>
    </div>
    <div class="form-group row">
    <label for="fichier" class="col-sm-4 col-form-label"> Upload le fichier :</label>
    <div class="col-sm-5">
      <input type="file" name="fichier" class="form-control" id="fichier" required>
        </div>
    </div> 
    
               
            <div class="form-group row">
            <div class="col-sm-10" align='center'>
              <button type="submit" name="submit" class="btn btn-primary my-1" >Ajouter</button>
            </div>
              </div>
            
</form>

<?php include("../includes/footer.php"); ?>