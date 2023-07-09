<?php
    session_start();
    
    $conn = new PDO("mysql:host=localhost;dbname=site_web;port=3306;charset=utf8", 'root', '');
    
    if(isset($_POST['submit']))
    {
            $email=$_POST['email'];
            $password=$_POST['password'];
        
            $sql="SELECT * FROM user WHERE email = '$email'";//la requette qui permet d importer des information de la base de donnee
            $cherche=$conn->prepare($sql);
            $cherche->execute();

            if($cherche->rowCount() > 0){
                $data = $cherche->fetchAll();
                if(password_verify($password, $data[0]["password"])){
                    $_SESSION["email"] = $email;
                    $_SESSION["nom"]=$nom;
                    header("Location: poster_annonce.php");
            exit;
                }
                else{
                    header("location:login.php");
                }
            }
    }
    ?>


<!DOCTYPE html> <!-- la creation d un document html -->
<html lang="fr"><!-- pour rendre la langue de la page francaise -->
<head> 
    <title> location d appartement </title> <!-- le titre du site -->
    <link rel="stylesheet" href="login.css"> <!-- le lien vers le CSS -->
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
    <div id="titre">
                                    <h1>LOCATION D APPARTEMENT</h1>
    </div>
        <div class = "carte">
            <div class="carte_haut">
                <div class="nom_carte">Log In</div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wifi" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 18l.01 0"></path>
                <path d="M9.172 15.172a4 4 0 0 1 5.656 0"></path>
                <path d="M6.343 12.343a8 8 0 0 1 11.314 0"></path>
                <path d="M3.515 9.515c4.686 -4.687 12.284 -4.687 17 0"></path>
                </svg>
            </div>
            <div class ="carte_centre">
                <img src="chip_carte.PNG">
            </div>
            <div class="carte_bas">
                <div class="carte_bas_gauche">
                <form name="login" method="POST" action="">
                    <input type="email" name="email" placeholder="ecrire votre email" required></br>
                    <input type="password" name="password" placeholder="ecrire votre password" required></br>
                    <input type="submit" name="submit" value="entrer">
                </div>
                <div class = "carte_bas_droite">
                   <span style="text-align: center;">Debit</span> 
                </div>
            </div>

</div>
</body>