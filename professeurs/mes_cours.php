        <?php session_start(); ?>
     <!DOCTYPE html>
     <html>
                <head>
                	<title>Formulaire</title>
                	<meta http-equiv="Content-Type" content="text/html;charset=utf8" />
                        <title>Admin page</title>
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                </head>
                <body>
      
     <?php include("includes/entete.php"); 
        if(isset($_GET['id_fichier'])){
            
        $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
		$id_fichier=$_GET['id_fichier'];
		$sql="DELETE FROM fichiers WHERE id_fichier=$id_fichier";
		$resultat=mysqli_query($bdd,$sql);
		mysqli_close($bdd);
		if($resultat)
		{
			echo "<h2 align='center'>Supprimé avec succés</h2>";
		}
		else
		{
			echo "<h2 align='center'>Il y a une erreur</h2>";
		}  
    }
        
?>
               
                
                   <br>
                    <h2 align='center'>Mes cours</h2><br><br>
            
           <?php 
                    $id_professeur=$_SESSION['id_professeur'];
                    $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
            $sql="select * from fichiers where $id_professeur";
            $resultat=mysqli_query($bdd,$sql);
            echo "<table align='center' class='table table-striped' style='text-align:center;'>";
            echo "<tr><th >Fichier</th><th>Cle</th><th>date ajout</th><th>Supression</th></tr>";
            if($resultat){
            while($donnee=mysqli_fetch_assoc($resultat))
            {
            extract($donnee);
            echo "<tr><td>".$alias."</td><td>".$cle."</td><td>".$date_ajout."</td><td><a href='mes_cours.php?id_fichier=$id_fichier'>Supprimer</a></td></tr>";
            }
            echo "</table>";
                }else{
                echo "<h2 align='center'>il y une erreur </h2>";
            } 
                    ?>
                   
    
                    </body>
</html>