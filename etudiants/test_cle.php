<?php 
session_start();
    
        if(isset($_POST['submit'])){
            
            $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
            $sql="select cle,chemin from fichiers where id_fichier ='".$_SESSION['id_fichier']."'";
            $resultat=mysqli_query($bdd,$sql);
            while($donnee=mysqli_fetch_assoc($resultat))
            {
            extract($donnee); 
            if($_POST['cle']==$cle){
                header('location: ../fichiers/'.$chemin);
            }else {
                echo "<h2 align='center'>Cle incorrect !!</h2>";
            }
        }
        }
include("includes/entete.php");
?>



<h1>Entrez la cle du cours : </h1><br><br>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
   <div class="form-group row">
        <label for="Cle" class="col-sm-1 col-form-label">Cle :</label>
        <div class="col-sm-3">
          <input type="password" class="form-control" id="Cle" name="cle" placeholder="Entrez la cle du cours">
        </div>
      </div>
      <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary my-1" >Telecharger</button>
    </div>
  </div> 
</form><br>
<h2 align='center'><a href="cours.php">Revenir au cours</a></h2><br><br>






<?php include("../includes/footer.php")?>