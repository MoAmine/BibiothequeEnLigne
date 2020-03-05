<?php 
session_start();
include("includes/entete.php");
            echo "<br>";
            $id_professeur=$_GET['id'];
            $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
            $sql="select * from fichiers where id_professeur =".$id_professeur;
            $resultat=mysqli_query($bdd,$sql);
            echo "<table align='center' class='table table-striped' width='100%' style='text-align:center;'>";
            echo "<tr><th >Fichier</th><th>date d'ajout</th><th>Telecharger</th></tr>";
            
            while($donnee=mysqli_fetch_assoc($resultat))
            {
            extract($donnee);
            echo "<tr><td>".$alias."</td><td>".$date_ajout."</td><td><a href='test_cle.php'>telecharger</a></td></tr>";
                $_SESSION['id_fichier']=$id_fichier;
            }
            
            echo "</table>";


include("../includes/footer.php");

?>