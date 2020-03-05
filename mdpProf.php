<?php
   session_start();
    $id=$_SESSION['id_professeur'];
    include("includes/entete.php");
    if(isset($_POST['submit'])){
        if($_POST['mdp']!=$_POST['mdpc']){
           echo"<h2 align='center'> Erreur dans la confirmation du mot de passe</h2>";
        }
            else  {
                $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
            
                $sql="update professeurs set mdp='".$_POST['mdp']."' WHERE id_professeur=".$id."";
                $resultat=mysqli_query($bdd,$sql);
                if($resultat){
                    echo "<h3 align='center'>Votre mot de passe est : ".$_POST['mdp']." , est ajouté <a href='seconnecter_prof.php'>Cliquez ici</a>
                    pour se connecter</h3>  ";
                    mysqli_close($bdd);
                    session_destroy();
                    include("includes/footer.php");
                    die();
                    }
                else{
                    echo"<br><br><br>";
                    echo "<h2 align='center'>il y a une erreur<h2>";
                    echo"<br><br>";
                     echo "<h3 align='center'>Vous devez réessayer ou contacter l'admin <a href='seconnecter_prof.php'>Reéssayer</a>
                    </h3>  ";
                     echo"<br><br>";
                    mysqli_close($bdd);
                    include("includes/footer.php");
                    die();
                    }
            }
        }
      
?>

<h1 align='center'>Choisissez un nouveau mot de passe : </h1><br><br>
<h2 align='center'>NB : Ce nouveau mot de passe est celui que vous allez l'utiliser pour s'authenfier(il doit etre different du CODE) </h2><br><br>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>" align='<center></center>'>
    

       <div class="form-group row">
        <label for="Password" class="col-sm-4 col-form-label">Mot de passe :</label>
        <div class="col-sm-5">
          <input type="password" class="form-control" id="Password" name="mdp" placeholder="Mot de passe">
        </div>
      </div>
       <div class="form-group row">
        <label for="Passwordc" class="col-sm-4 col-form-label">Confirmer :</label>
        <div class="col-sm-5">
          <input type="password" class="form-control" id="Passwordc" name="mdpc" placeholder="Confirmer">
        </div>
      </div>
      <div class="form-group row">
    <div class="col-sm-10" align='center'>
      <button type="submit" name="submit" class="btn btn-primary my-1" >Valider</button>
    </div>
  </div> 
      
      
</form>
<?php include("includes/footer.php"); ?>