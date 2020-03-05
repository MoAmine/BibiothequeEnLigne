<?php session_start();
              if(isset($_GET['id_professeur']))
	{
        $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
		$id_professeur=$_GET['id_professeur'];
		$sql="DELETE FROM professeurs WHERE id_professeur=$id_professeur";
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
                   <br>
                    <h1 align='center'>Admin page</h1><br><br>
                    <h2 align='center'>Liste des profs</h2><br><br>
            
           <?php 
                    $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
            $sql="select * from professeurs";
            $resultat=mysqli_query($bdd,$sql);
            echo "<table align='center' class='table table-striped' width='100%' style='text-align:center;'>";
            echo "<tr><th >Nom</th><th>Prenom</th><th>Email</th><th>Code</th><th>Suppression</tr>";
            
            while($donnee=mysqli_fetch_assoc($resultat))
            {
            extract($donnee);
            echo "<tr><td>".$nom."</td><td>".$prenom."</td><td>".$email."</td><td>".$code."</td><td><a href='liste_prof.php?id_professeur=$id_professeur'>Supprimer</a></td></tr>";
            }
            
            echo "</table>"; ?>
                   <div align='center'>
    <a href='../deconnexion.php'><button type="submit" name="submit" class="btn btn-secondary btn-lg">Deconnexion</button></a>
    <a href='admin.php'><button type="submit" name="submit" class="btn btn-secondary btn-lg">Ajouter un nouveau professeur </button></a>
    </div>
                    </body>
</html>