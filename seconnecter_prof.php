<?php 
    session_start();
        $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
            
       if (isset($_POST['submit'])) {
            extract($_POST);
            if($email=="admin@admin.fsj" && $mdp=="123456"){ 
                    header("Location: admin/admin.php");
                    exit();
            }

              $sql_prof="SELECT * FROM professeurs WHERE email='$email' AND mdp='$mdp'";
              
              $resultat_prof=mysqli_query($bdd,$sql_prof);
                
                  if($resultat_prof && mysqli_num_rows($resultat_prof)!=0)
                        {
                            $row=mysqli_fetch_assoc($resultat_prof);
                            if($mdp==$row['code']){
                            $_SESSION['id_professeur']=$row['id_professeur'];
                            header("Location: mdpProf.php");
                            exit();
                  
                            }else {
                           
                            $_SESSION['id_professeur']=$row['id_professeur'];
                            header("Location: professeurs/accueil.php");
                            exit();
                            
                            }
                        
                    }else{
                            echo "<h2 align='center'> Email ou Mot de passe incorrect</h2>";
                                
                    }
              
            mysqli_close($bdd);
           
           }
            
include("includes/entete.php");

?>
<h1 align='center'> Entrez votre Email et mot de passe : </h1><br><br>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>" align='center'>  
   <div class="form-group row">
    <label for="Email" class="col-sm-4 col-form-label">Email :</label>
    <div class="col-sm-5">
      <input type="email" name="email" class="form-control" id="Email" placeholder="Email" required>
    </div>
  </div>
   <div class="form-group row">
    <label for="Password" class="col-sm-4 col-form-label">Mot de passe :</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="Password" name="mdp" placeholder="Mot de passe" required>
    </div>
  </div>
     <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary my-1">Connexion</button>
    </div>
  </div>  
      
      
</form>


<h2 align='center'>Si vous n'etes pas encore inscrits <a href="sinscrire.php">Cliquez ici</a></h2><br><br>    

<?php include("includes/footer.php"); ?>