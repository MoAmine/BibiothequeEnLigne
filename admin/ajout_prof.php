<?php 
    session_start();
    if(isset($_POST['submit'])){
        
    $bdd=mysqli_connect("localhost","root","","moocdb") or die(mysqli_connect_error());
    extract($_POST);
    $code=rand(10000,20000);
    $sql="insert into professeurs values (0,'$email','$nom','$prenom',$code,'$departement','$code')";        
    $resultat=mysqli_query($bdd,$sql);
                
        if($resultat){
                    echo "<h1 align='center'>Ajouté avec succés !</h1><hr>";
                    }
                else{
                    echo "<h2 align='center'>il y a une erreur<h2>";
                    }
        mysqli_close($bdd); 
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
    <h2 align='center'>Ajout des profs à la base de données</h2>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" align='center'>
      <table  class='table table-striped' style='text-align:center;'>
       <tr>
        <td><label for="nom">Nom :</label></td> 
        <td><input type="text" id="Nom" name="nom" class="form-control w-50" required></td>
       </tr>
       <tr>
        <td><label for="prenom">Prenom : </label></td> 
        <td><input type="text" id="prenom" name="prenom" class="form-control w-50" required></td>
       </tr>
       <tr>
        <td><label for="email">Email : </label></td> 
        <td><input type="text" id="email" name="email" class="form-control w-50" required></td>
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
    </table>
    <button type="submit" name="submit" class="btn btn-primary my-1">Ajouter</button>
    </form>
    <hr>
    <div align='center'>
    <a href='liste_prof.php'><button type="submit" name="submit" class="btn btn-secondary btn-lg">Liste des profs </button></a>
    <a href='ajout_etud.php'><button type="submit" name="submit" class="btn btn-secondary btn-lg">Ajout des étudiants </button></a>
    <a href='liste_etud.php'><button type="submit" name="submit" class="btn btn-secondary btn-lg">Liste des étudiants </button></a>
    </div>
    </body>
</html>
