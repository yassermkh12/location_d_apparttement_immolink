<!DOCTYPE html>
<html lang="fr">
<head> 
    <title> location d appartement </title>
    <link rel="stylesheet" href="inscription.css"> 
</head>
<body>
<header>
        <div class="logo">immoLink</div>
        <div class="hum">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li>
                    <a href="login.php" id="connexion">Connexion</a>
                </li>
                <li>
                    <a href="inscription.php"  id="inscription">Inscription</a>
                </li>
                <li>
                    <a href="propos.php"  id="propos">A propos</a>
                </li>
            </ul>
        </nav>
        </header>
    <div class="container">
    <div class="title">Inscription</div>
    <div class="content">
      <form name="inscription" method="POST" action="#" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" name="nom" placeholder="Enter votre nom" required>
          </div>
          <div class="input-box">
            <span class="details">Prenom</span>
            <input type="text" name="prenom" placeholder="Enter votre prenom" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter votre email" required>
          </div>
          <div class="input-box">
            <span class="details">Numero De Telephone</span>
            <input type="text" name="tel" placeholder="Enter ton numero" required>
          </div>
          <div class="input-box">
            <span class="details">Age</span>
            <input type="text" name="age" placeholder="Entrer votre age" required>
          </div>
          <div class="input-box">
            <span class="details">Pays</span>
            <input type="text" name="pays" placeholder="Enter votre pays" required>
          </div>
          <div class="input-box">
            <span class="details">ville</span>
            <input type="text" name="ville" placeholder="Enter votre ville" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter votre password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirmer Password</span>
            <input type="password" name="cpassword" placeholder="Confirmer votre password" required>
          </div>
          <div class="input-box">
            <span class="details">Image de profil</span>
            <input type="file" id="file" name="image" accept="image/*">
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="sexe" id="dot-1" value="male" required>
          <input type="radio" name="sexe" id="dot-2" value="femele" required>
          <input type="radio" name="sexe" id="dot-3" value="autre" required>
          <span class="gender-title">sexe</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Femelle</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="s inscrire">
        </div>
      </form>
    </div>
  </div>

<!-- php -->


<?php
    //$conn = new PDO("mysql:host=localhost;dbname=site_web;port=3306;charset=utf8", 'root', '');//la variable de connexion

    $conn = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,'site_web');
    

    if(isset($_POST['submit']))//verification si le boutton envoyer existe
    {
        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['age']) && !empty($_POST['pays']) && !empty($_POST['ville']) && !empty($_POST['password']) && !empty($_POST['cpassword']) && !empty($_POST['sexe']))//verification si la les chamop sont bien remplit
        {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];       
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $age = $_POST['age'];
            $pays = $_POST['pays'];
            $ville = $_POST['ville'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $sexe = $_POST['sexe'];
            $img = addslashes(file_get_contents($_FILES['image']['tmp_name']));

            if($password == $cpassword){

            $password = password_hash($password, PASSWORD_DEFAULT);
            
            /*if ($conn->query($sql) === TRUE) {
              echo "Les données ont été insérées avec succès";
          } else {
              echo "Erreur lors de l'insertion des données : ";
          }*/
            $sql_run = mysqli_query($conn,$sql);
            if(!empty($_POST['image'])){
              $sql1 = "INSERT INTO user (nom,prenom,email,tel,age,pays,ville,sexe,password,img) VALUES ('$nom','$prenom','$email','$tel','$age','$pays','$ville','$sexe','$password','$img')";
              $sql1_run = mysqli_query($conn,$sql1);
            }else{
              $sql = "INSERT INTO user (nom,prenom,email,tel,age,pays,ville,sexe,password) VALUES ('$nom','$prenom','$email','$tel','$age','$pays','$ville','$sexe','$password')";
            }
            }
        }
    }
    ?>

</body>