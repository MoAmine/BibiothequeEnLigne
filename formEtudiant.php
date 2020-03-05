<?php
    include("includes/entete.php");
?>

<h1 align='center'>Remplissez le formulaire suivant  : </h1><br><br>
<?php 

    
    if(isset($_POST['submit'])){
            $i=0;
            $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
             $resultat=mysqli_query($bdd,'SELECT email FROM etudiants');
        
            while($donnee=mysqli_fetch_assoc($resultat))
                    {
	       extract($donnee);
                if($_POST['email']==$email){
                    $i++;
                    }
            }
        
        if($_POST['mdp']!=$_POST['mdpc']){
           echo"<h2 align='center'> Erreur dans la confirmation du mot de passe</h2>";
    
        }else if($i>0) {
            echo"<h2 align='center'> Vous etes déja inscrit </h2>"; 
            echo"<h2 align='center'><a href='seconnecter.php'>Cliquez ici</a> pour se connecter </h2>"; 
                    }
            else {
                $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
            
                $sql="insert into etudiants values (0,'".$_POST['email']."','".$_POST['mdp']."')";
            
                $resultat=mysqli_query($bdd,$sql);
                if($resultat){
                    echo "<h2 align='center'>Votre email et mot de passe , sont ajoutés <a href='seconnecter.php'>Cliquez ici</a>
                    pour se connecter</h2>  ";
                    }
                else{
                    echo "<h2 align='center'>il y a une erreur<h2>";
                    }
            mysqli_close($bdd);
            }
        }
?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>" align='center'>
    <div class="form-group row">
        <label for="Email" class="col-sm-4 col-form-label">Email :</label>
        <div class="col-sm-5">
            <input type="email" name="email" class="form-control" id="Email" placeholder="Email">
        </div>
      </div>
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
    <div class="col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary my-1" >Valider</button>
    </div>
  </div> 
</form>

<?php include("includes/footer.php"); ?>