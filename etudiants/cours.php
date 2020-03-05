<?php 
session_start();
include("includes/entete.php");

?>
<h1 align='center'> Cours par département : </h1><br>
<ul>
   <?php  
        $departement=array('Informatique','Mathematique','Biologie','Geologie','Chimie','Physique');
            foreach($departement as $depa){
                echo "<p>".$depa ." :</p>";
    
        $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
        $resultat=mysqli_query($bdd,"SELECT id_professeur,nom,prenom FROM professeurs where departement='".$depa."'");
        while($donnee=mysqli_fetch_assoc($resultat))
            {
            extract($donnee);
            echo "<ul>";
        echo "<li><a href='cours_prof.php?id=".$id_professeur."'> Prof :".$nom." ".$prenom."<a></li>";
      echo "</ul>";  
        }  
      }
    ?>
</ul><br><br>
<?php include("../includes/footer.php") ?>