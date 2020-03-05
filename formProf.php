<?php 
    session_start();
    include("includes/entete.php");
    if(isset($_POST['submit'])){
        $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
        $resultat=mysqli_query($bdd,'SELECT * FROM professeurs');
        if($resultat){   
        while($donnee=mysqli_fetch_assoc($resultat))
        {
	    extract($donnee);
        
        if($_POST['nom']==$nom && $_POST['prenom']==$prenom && $_POST['email']==$email){
            $header="MIME-Version: 1.0\r\n";
            $header.='From:"Bibliotheque FSJ"<bibliothequefsj@gmail.com>'."\n";
            $header.='Content-Type:text/html; charset="uft-8"'."\n";
            $header.='Content-Transfer-Encoding: 8bit';

            $message='
            <html>
            <body>
            <div align="center">
            
            <strong>Bonjour/Bonsoir prof : '.$nom.' '.$prenom.',<br>
            Votre code est : '.$code.'<br>
            Vous avez à entrez ce code comme mot de passe pour votre 1ère authentification <br> 
            Après vous serez inviter à choisir un nouveau mot de passe qui va etre votre mot de passe pour les authentification qui viennent </strong><br><br><br>
            Team bibliothèque FSJ
            
            </div>
            </body>
            </html>
            ';

            mail("$email", "Votre Code D'inintialisation ", $message, $header);
                
           echo"<br><br>";
          echo"<h2 align='center'>Un email est envoyé à votre compte, cet email contient les informations nécessaire pour vous connecter</h2>";
          echo"<h3 align='center'><a href='seconnecter_prof.php'> Se connecter </a></h3>";
            echo"<br><br>";
            include("includes/footer.php");
            mysqli_free_result($resultat);
            mysqli_close($bdd);
            session_destroy();
             die();     
            }
           } 
          echo"<h2 align='center'> Vos coordonnées n'existent pas dans la base des données</h2>";
          echo"<p align='center'><a href='formProf.php'> Retourner </a><p>"; 
                
          }  
        mysqli_free_result($resultat);
        mysqli_close($bdd);
        session_destroy();
        }    

?>
    <h1 align='center'>Entrez vos coordonnées : </h1><br><br>
    
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>" align='center' >
    
    <div class="form-group row">
    <label for="Nom" class="col-sm-4 col-form-label">Nom :</label>
    <div class="col-sm-5">
      <input type="text" name="nom" class="form-control" id="Nom" placeholder="Votre nom">
    </div>
        </div>
    <div class="form-group row">
    <label for="Prenom" class="col-sm-4 col-form-label">Prenom : </label>
    <div class="col-sm-5">
      <input type="text" name="prenom" class="form-control" id="Prenom" placeholder="Votre prenom">
    </div>
        </div>
     
    <div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label">Email : </label>
    <div class="col-sm-5">
      <input type="text" name="email" class="form-control" id="email" placeholder="Votre email donné à la direction">
        </div>
    </div> 
    
       <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary my-1" >Valider</button>
    </div>
  </div>
      
   
</form>
       




<?php include("includes/footer.php"); ?>

