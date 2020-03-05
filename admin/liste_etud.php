<?php session_start();
              if(isset($_GET['cne']))
	{
        $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
		$id_professeur=$_GET['cne'];
		$sql="DELETE FROM etudiants WHERE cne=$cne";
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
                    <a href='../deconnexion.php'><button type="submit" name="submit" class="btn btn-secondary btn-lg">Deconnexion</button></a>
                    <h1 align='center'>Admin page</h1><br><br>
                    <h2 align='center'>Liste des étudiants</h2><br><br>
            
           <?php 
                    $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
            $sql="select * from etudiants";
            $resultat=mysqli_query($bdd,$sql);
            echo "<table align='center' class='table table-striped' width='100%' style='text-align:center;'>";
            echo "<tr><th >CNE</th><th>Nom</th><th>Prenom</th><th>Email</th><th>S1</th><th>S2</th><th>S3</th><th>S4</th><th>S5</th><th>S6</th><th>Filière</th><th>Modification</th><th>Suppression</th></tr>";
            if($resultat){
            while($donnee=mysqli_fetch_assoc($resultat))
            {
            extract($donnee);
            echo "<tr><td>".$cne."</td><td>".$nom."</td><td>".$prenom."</td><td>".$email."</td><td>".$S1."</td><td>".$S1."</td><td>".$S2."</td><td>".$S3."</td><td>".$S4."</td><td>".$S5."</td><td>".$departement."</td><td><a href='modif_etud.php?cne=$cne'>Modifier</a></td><td><a href='liste_etud.php?cne=$cne'>Supprimer</a></td></tr>";
            }
                    }
            
            echo "</table>"; ?>
                <div align='center'>
                   
                    
                    <a href='../deconnexion.php'><button type="submit" name="submit" class="btn btn-secondary btn-lg">Ajouter un nouveau professeur </button></a>
                    <a href='../deconnexion.php'><button type="submit" name="submit" class="btn btn-secondary btn-lg">Ajouter un nouveau professeur </button></a>
    <a href='../deconnexion.php'>
    <button type="submit" name="submit" class="btn btn-secondary btn-lg">Ajouter un nouveau professeur </button></a>
    </div>
                    </body>
</html>