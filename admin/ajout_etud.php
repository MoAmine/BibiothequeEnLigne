 <?php 
    session_start();
    if(isset($_POST['submit'])){
        $i=0;$c=0;
    $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
    extract($_POST);
        if(strlen($cne)!=10){
            echo "<h1 align='center'>Nombre de caractères du CNE doit etre 10 ! </h1><hr>";
        }else{
            
        
    $sql="insert into etudiants values ('$cne','','$nom','$prenom','non','non','non','non','non','non','$departement','')";        
    $resultat=mysqli_query($bdd,$sql);
     if($resultat){
         
        foreach((array)$semestre as $s){
            $c++;
            $sql="UPDATE etudiants
                SET $s ='oui'
                WHERE cne=$cne";
                $resultat.''.$s=mysqli_query($bdd,$sql);
                if($resultat.''.$s)
                    $i++;
            } 
        }
                
                if($i==$c){
                    echo "<h1 align='center'>Ajouté avec succés !</h1><hr>";
                    }
                else{
                    echo "<h2 align='center'>il y a une erreur<h2>";
                    }
        mysqli_close($bdd); 
    }
        }


?>
 
 
 
 <!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf8" />
        <title>Admin page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
   <br>
     <div align='center'>
         <a href='../deconnexion.php'><button type="submit" name="submit" class="btn btn-secondary btn-lg">Deconnexion</button></a>
         </div><hr>
    <h1 align='center'>Admin page</h1><hr>
    <h2 align='center'>Ajout des étudiants à la base de données</h2>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" align='center'>
      <table  class='table table-striped' style='text-align:center;'>
       <tr>
        <td><label for="cne">CNE : (10 chiffres)</label></td> 
        <td><input type="text" id="cne" name="cne" min="10" max="10"  class="form-control w-50" required></td>
       </tr>
       <tr>
        <td><label for="prenom">Prènom : </label></td> 
        <td><input type="text" id="prenom" name="prenom" class="form-control w-50" required></td>
       </tr>
       <tr>
        <td><label for="nom">Nom : </label></td> 
        <td><input type="text" id="nom" name="nom" class="form-control w-50" required></td>
       </tr>
       <tr>
        <td><label for="departement">Departement: </label></td> 
        <td>
            <select name="departement" id="departement" class="form-control w-50" >
                  <option name="informatique" >informatique</option>
                  <option name="mathematique" >mathematique</option>
                  <option name="biologie" >biologie</option>
                  <option name="geologie">geologie</option>
                  <option name="chimie" >chimie</option>
                  <option name="physique">physique</option>
            </select>
        </td>
          </tr>
           <tr>
        <td><label for="semestre">Inscrit à : </label></td> 
        <td style='float:left'>
            <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input"  value="S1" name="semestre[]" id="s1">
              <label class="form-check-label" for="s1">S1</label>
            </div>


            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" value="S2" name="semestre[]" id="s2">
                <label class="form-check-label" for="s2">S2</label>
            </div>


            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" value="S3" name="semestre[]" id="s3">
                <label class="form-check-label" for="s3">S3</label>
            </div>
                     <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input" value="S4" name="semestre[]" id="s4">
              <label class="form-check-label" for="s4">S4</label>
            </div>


            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" value="S5" name="semestre[]" id="s5">
                <label class="form-check-label" for="s5">S5</label>
            </div>


            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" value="S6" name="semestre[]" id="s6">
                <label class="form-check-label" for="s6">S6</label>
            </div>
          </tr>
    </table>
    <button type="submit" name="submit" class="btn btn-primary my-1">Ajouter</button>
    </form>
    <hr>
    <div align='center'>
    <a href='liste_prof.php'><button type="submit" name="submit" class="btn btn-secondary btn-lg">Liste des profs </button></a>
    <a href='ajout_prof.php'><button type="submit" name="submit" class="btn btn-secondary btn-lg">Ajouter un prof </button></a>
    <a href='liste_etud.php'><button type="submit" name="submit" class="btn btn-secondary btn-lg">Liste des étudiants </button></a>
    </div>
    </body>
</html>