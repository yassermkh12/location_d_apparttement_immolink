<?php
session_start();

$conn = new PDO("mysql:host=localhost;dbname=site_web;port=3306;charset=utf8", 'root', '');
$email = $_SESSION["email"];

$sql="SELECT * FROM user WHERE email = '$email'";//la requette qui permet d importer des information de la base de donnee
$cherche=$conn->prepare($sql);
$cherche->execute();

while($data = $cherche->fetch()){
  $nom = $data['nom'];
  $prenom = $data['prenom'];       
  $email = $data['email'];
  $tel = $data['tel'];
  $age = $data['age'];
  $pays = $data['pays'];
  $ville = $data['ville'];
  $sexe = $data['sexe'];
  $img = $data['img'];
}
$img = base64_encode($img);
?>

<?php
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'site_web');


// Connexion à la base de données
// Vérification si le formulaire a été soumis pour la mise à jour de l'image
if (isset($_POST['m_a_j'])) {
    // Récupération des données de la nouvelle image
    $img = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    
    // Mise à jour des données de l'image dans la base de données
    $sql = "UPDATE user SET img = '{$img}' WHERE email = '$email'";
    $sql_run = mysqli_query($conn,$sql);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head> 
    <title> location d appartement </title>
    <link rel="stylesheet" href="poster_annonce.css">
    <script src="pages_des_annonces.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <!-- region 1 -->
    <section class="header">
    <nav class="navbar-container">
    <ul class="list">
      <div style="--position: 0;" data-indicator class="indicator">
        <div class="corners"></div>
      </div>
      <li><a href="#" class="active">
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/>
          </svg>
        </div>
        <div class="text">Home</div>
      </a></li>
      <li><a href="#">
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"/></svg>
        </div>
        <div class="text">Profile</div>
      </a></li>
      <li><a href="#">
        <div class="icon">
        <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12.002 2c5.518 0 9.998 4.48 9.998 9.998 0 5.517-4.48 9.997-9.998 9.997-5.517 0-9.997-4.48-9.997-9.997 0-5.518 4.48-9.998 9.997-9.998zm0 1.5c-4.69 0-8.497 3.808-8.497 8.498s3.807 8.497 8.497 8.497 8.498-3.807 8.498-8.497-3.808-8.498-8.498-8.498zm-.747 7.75h-3.5c-.414 0-.75.336-.75.75s.336.75.75.75h3.5v3.5c0 .414.336.75.75.75s.75-.336.75-.75v-3.5h3.5c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-3.5v-3.5c0-.414-.336-.75-.75-.75s-.75.336-.75.75z" fill-rule="nonzero"/></svg>
        </div>
        <div class="text">ajouter des annoces</div>
      </a></li>
      <li><a href="#">
        <div class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 20v2h-2v-2h2zm2-2h-6v6h6v-6zm6-1v5h-2v-5h2zm2-2h-6v9h6v-9zm6-2v9h-2v-9h2zm2-2h-6v13h6v-13zm0-11l-6 1.221 1.716 1.708-6.85 6.733-3.001-3.002-7.841 7.797 1.41 1.418 6.427-6.39 2.991 2.993 8.28-8.137 1.667 1.66 1.201-6.001z"/></svg>
        </div>
        <div class="text">Statistique</div>
      </a></li>
      <li><a href="#">
        <div class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 14.874v-1.814h-3.25c-.745 0-1.128-.26-1.451-.706l-1.709-2.302-2.791 3.024 1.509 2.149c.478.753.514 1.267.514 1.952v5.823h-2.699v-5.474c-.021-1.512-2.455-2.945-3.303-1.723l-1.617 2.281c-.359.51-.971.686-1.565.686h-4.638v-2.621l3.483-.003c.544 0 1.017-.193 1.274-.806l1.549-3.782c.269-.563.632-1.076 1.076-1.515l3.609-3.573-1.02-.891c-.306-.267-.716-.381-1.116-.311l-2.999.525-.471-2.201 4.115-.784c.771-.147 1.433.103 2.009.636l3.961 3.656c.628.57 1.272 1.563 2.276 3.047.184.272.443.656 1.053.656h2.201v-1.85l3 2.96-3 2.961zm-3.101-8.747c1.403-.268 2.323-1.623 2.055-3.026-.269-1.403-1.624-2.323-3.026-2.055-1.403.269-2.323 1.624-2.055 3.026.268 1.404 1.623 2.324 3.026 2.055z"/></svg>
        </div>
        <div class="text">Logout</div>
      </a></li>
    </ul>
  </nav>
    </section>

    <!-- region 2 -->

<section>
    <div class="container" id="poster_annonce" hidden>
    <div class="title">Information sur l appartement</div>
    <div class="content">
      <form name="annonce" method="POST" action="#" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Ville</span>
            <input name = "ville" list="ville" placeholder = "selecter votre ville" required>
                <datalist id = 'ville'>
                    <option value="option1">
                    <option value="option2">
                    <option value="option3">
          </div>
          <div class="input-box">
            <span class="details">Secteur</span>
            <input name = "secteur" list="secteur" placeholder = "selecter votre secteur" required>
                <datalist id = 'secteur'>
                    <option value="option1">
                    <option value="option2">
                    <option value="option3">
          </div>
          <div class="input-box">
            <span class="details">Emplacement</span>
            <input type="text" name="emplacement" placeholder="Tapper l emplacement ou se trouve l appartement" required>
          </div>
          <div class="input-box">
            <span class="details">Nombre de chambre</span>
            <input type="number" id="quantite" placeholder="nombre de chambre" name="nb_chambre" min="0" max="10" step="1" required>
        </div>
          <div class="input-box">
            <span class="details">Salle de bain</span>
            <input type="number" id="quantite" name="salle_de_bain" placeholder="salle de bain" min="0" max="10" step="1" required>
          </div>
          <div class="input-box">
            <span class="details">Salon</span>
            <input type="number" id="quantite" name="salon" placeholder="salon" min="0" max="10" step="1" required>
          </div>
          <div class="input-box">
            <span class="details">Etage</span>
            <input type="number" id="quantite" name="etage" placeholder="etage" min="0" max="10" step="1" required>
          </div>
          <div class="input-box">
            <span class="details">Age de l appartement</span>
            <input type="number" id="quantite" name="age_app" placeholder="age de l appartement" min="0" max="10" step="1" required>
          </div>
          <div class="input-box">
            <span class="details">Surface</span>
            <input type="text" name="surface" placeholder="Enter votre password" required>
          </div>
        </div>
          <div class="title">Information sur l annonce</div>
            <div class="user-details">
            <div class="input-box">
          <span class="details">Titre de l annonce</span>
            <input type="text" name="titre" placeholder="Titre de l annonce" required>
          </div>
          <div class="input-box">
            <span class="details">Prix</span>
            <input type="text" name="prix" placeholder="Prix" required>
          </div>
          <div class="input-box">
            <span class="details">Commentaire</span>
            <textarea id="commentaire" name="commentaire" rows="5" required></textarea>
          </div>
        </div>
        <div class="title">Photo</div>
        <div class="user-details">
        <div class="input-box">
        <span class="details">Ajouter des images</span>
        <div class="img-container"></div>
        <input type="file" id="file" name=image1 accept="image/*"  hidden required>
        <br>
        <input type="file" id="file" name=image2 accept="image/*"  hidden required>
        <br>
        <input type="file" id="file" name=image3 accept="image/*" hidden required>
        <br>
        <input type="file" id="file" name=image4 accept="image/*" hidden required>
        <br>
        <input type="file" id="file" name=image5 accept="image/*"  hidden required>
        <br>
        <input type="file" id="file" name=image6 accept="image/*"  hidden required>
      <br>  
      </div>
        </div>
        <div class="button">
          <input type="submit" name="envoyer" value="Poster l annonce">
        </div>
      </form>
    </div>
  </div>

  <?php
// Database connection code

$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,'site_web');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['envoyer'])) {
  $ville = $_POST['ville'];
  $secteur = $_POST['secteur'];       
  $emplacement = $_POST['emplacement'];
  $nb_chambre = $_POST['nb_chambre'];
  $commentaire = $_POST['commentaire'];
  $prix = $_POST['prix'];
  $titre = $_POST['titre'];
  $surface = $_POST['surface'];
  $age_app = $_POST['age_app'];
  $etage = $_POST['etage'];
  $salon = $_POST['salon'];
  $salle_de_bain = $_POST['salle_de_bain'];       
  $email = $_SESSION["email"];

  $img1 = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
  $img2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
  $img3 = addslashes(file_get_contents($_FILES['image3']['tmp_name']));
  $img4 = addslashes(file_get_contents($_FILES['image4']['tmp_name']));
  $img5 = addslashes(file_get_contents($_FILES['image5']['tmp_name']));
  $img6 = addslashes(file_get_contents($_FILES['image6']['tmp_name']));

  $sql = "INSERT INTO annonce (email,ville_app,secteur_app,emplacement,nb_chambre,salle_de_bain,salon,etage,age_de_app,surface,titre,prix,commentaire,photo1,photo2,photo3,photo4,photo5,photo6) VALUES ('$email','$ville','$secteur','$emplacement',' $nb_chambre','$salle_de_bain','$salon','$etage',' $age_app','$surface','$titre','$prix','$commentaire','$img1','$img2','$img3','$img4','$img5','$img6')";

  $sql_run = mysqli_query($conn,$sql);

}
mysqli_close($conn);

?>
</section>

<section>
  <!-- region 3 -->

  <div class="wrapper" id="profil" hidden>
      <div class="profile-top">
        <div class="profile-image">
          <?php
        echo '<img   width= "200px"; height="200px" src="data:image/jpeg;base64,' . $img . '" />';
        ?>
        </div>

        <form name="update" method="POST" action="#" enctype="multipart/form-data">
        <input type="file" id="file1" name="image" accept="image/*" multiple class="input-file" hidden>
        <input type="submit" class="m_a_j" name="m_a_j" value="s inscrire" hidden>
      </div>
</form>

      <div class="profile-bottom">
        <div class="profile-infos">
          <div class="main-infos">
            <h3 class="name"><?php echo $prenom." ".$nom ?></h3>
            <p class="age grey"><?php echo $age ?></p>
          </div>
          <p class="email"><?php echo $email ?></p>
          <p class="ville"><ion-icon name="location"></ion-icon><?php echo $ville ?></p>
        </div>

        <div class="profile-stats">
          <div class="stat-item">
            <p class="stat"><?php echo $pays ?></p>
            <p class="grey">pays</p>
          </div>
          <div class="stat-item">
            <p class="stat"><?php echo $sexe ?></p>
            <p class="grey">sexe</p>
          </div>
          <div class="stat-item">
            <p class="stat"><?php echo"0".$tel ?></p>
            <p class="grey">telephone</p>
          </div>
        </div>
      </div>
    </div>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
</section>

  <!-- region 4 -->
<section>
<div class="container_graphe" id="statistique" hidden>
<div class="row_graphe">
        <section class="annonce_graphe">
        <h2>Les visteurs du site selon le sexe<h2>
                <canvas class="myChart" id="myChart"></canvas>
        </section>
        <section class="annonce_graphe">
            <h2>Les visteurs du site selon le pays<h2>
                <canvas class="myChart" id="myChart1"></canvas>
        </section>
</div>
<div class="row_graphe">
        <section class="annonce_graphe">
            <h2>Les visteurs du site selon l age<h2>
                <canvas class="myChart" id="myChart2"></canvas>
        </section>
        <section class="annonce_graphe">
            <h2>Les appartement a loue selon la surface<h2>
                <canvas class="myChart" id="myChart3"></canvas>
        </section>
</div>



<?php
$conn = mysqli_connect("localhost","root","","site_web");
$male = "male";
$femelle = "femelle";

$sql1="SELECT * FROM user where sexe='$male'";//la requette qui permet d importer des information de la base de donnee
$sql2="SELECT * FROM user where sexe='$femelle'";

$sql3="SELECT * FROM user where pays='maroc'";

$sql4="SELECT * FROM user";

$sql5="SELECT * FROM annonce";


$result1=mysqli_query($conn, $sql1);
$result2=mysqli_query($conn, $sql2);

$result3=mysqli_query($conn, $sql3);

$result4=mysqli_query($conn, $sql4);

$result5=mysqli_query($conn, $sql5);


$i1=0;
foreach($result1 as $data){
    $sexe1[] = $data["sexe"];
    $i1 = $i1 + 1;
}

$i2=0;
foreach($result2 as $data){
    $sexe2[] = $data["sexe"];
    $i2 = $i2 + 1;
}

$ii1=0;
$i3=0;
$j3=0;
foreach($result3 as $data){
    $sexe3[] = $data["pays"];
    if($sexe3[$ii1]=="maroc"){
        $i3 = $i3 + 1;
    }else{
        $j3=$j3+1;
    }
    $ii1=$ii1+1;

}


$ii2=0;
$i4=0;
$j4=0;
foreach($result4 as $data){
    $age1[] = $data["age"];
    if($age1[$ii2]<=50){
        $i4 = $i4 + 1;
    }else{
        $j4=$j4+1;
    }
    $ii2=$ii2+1;
}


$ii3=0;
$i5=0;
$j5=0;
$k5=0;
foreach($result5 as $data){
    $surface[] = $data["surface"];
    if($surface[$ii3]<=50){
        $i5 = $i5 + 1;
    }elseif($surface[$ii3]>50 && $surface[$ii3]<=100){
        $j5=$j5+1;
    }elseif($surface[$ii3]>100){
        $k5=$k5+1;
    }
    $ii3=$ii3+1;
}

?>
<script>
  const ctx = document.getElementById('myChart');

  const labels = ['male','femelle'];
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'les visteurs du site selon le sexe',
        data: [<?php echo $i1 ?>, <?php echo $i2 ?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const ctx2 = document.getElementById('myChart1');

  new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: ['Maroc' , 'Autre pays'],
      datasets: [{
        label: 'les visteurs du site selon le pays',
        data: [<?php echo $i3 ?>, <?php echo $j3 ?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const ctx3 = document.getElementById('myChart2');

const labels3 = ['jeunes','vieux'];
new Chart(ctx3, {
  type: 'bar',
  data: {
    labels: labels3,
    datasets: [{
      label: 'les visteurs du site selon l age',
      data: [<?php echo $i4 ?>, <?php echo $j4 ?>],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

const ctx4 = document.getElementById('myChart3');

const labels4 = ['petit appartement','appartement moyen', 'grand appartement'];
new Chart(ctx4, {
  type: 'bar',
  data: {
    labels: labels4,
    datasets: [{
      label: 'les appartement a loue selon la surface',
      data: [<?php echo $i5 ?>, <?php echo $j5 ?>, <?php echo $k5 ?>],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

</script>
</div>
</section>


  <!-- region 5 -->

  <div id="page_des_annonces" >
  <section class="space">
        <div class = "contenaire">
		<select id="categorie">
			<option value="">Toutes les catégories</option>
			<option value="Catégorie 1">Catégorie 1</option>
			<option value="Catégorie 2">Catégorie 2</option>
			<option value="Catégorie 3">Catégorie 3</option>
		</select>
		<select id="tri">
			<option value="prix-asc">Prix croissant</option>
			<option value="prix-desc">Prix décroissant</option>
		</select>
		<input type="text" id="recherche" placeholder="Recherche...">
    </div>
    </section>

    <div class = "contenaire_1">
	<main>
		<section id="annonces">
      <?php 
      $conn = new PDO("mysql:host=localhost;dbname=site_web;port=3306;charset=utf8", 'root', '');

      $sql1="SELECT * FROM user where email = '$email'";
      $cherche1=$conn->prepare($sql1);
      $cherche1->execute();
      while($result1 = $cherche1->fetch(PDO :: FETCH_ASSOC)){
        $id_user = $result1["id"];
      }

      $sql="SELECT * FROM annonce";//la requette qui permet d importer des information de la base de donnee
      $cherche=$conn->prepare($sql);
      $cherche->execute();
      
      while($result1 = $cherche1->fetch(PDO :: FETCH_ASSOC)){
        $id_user = $result1["id"];
      }
      while($result = $cherche->fetch(PDO :: FETCH_ASSOC) ) : ?>
      <div class="annonce">
        <h2><?php echo $result["titre"] ?></h2>
        <p><?php echo $result["prix"]." DH" ?></p>
        <button onclick="window.location.href='annonce.php?id_user=<?php echo $id_user ?>&id_annonce=<?php echo $result["id"]; ?>'">Voir l'annonce</button>
        </div>
        <?php endwhile ?>
      

        <?php
        $conn = new PDO("mysql:host=localhost;dbname=site_web;port=3306;charset=utf8", 'root', '');


        $sql3="SELECT * FROM annonce";
        $stmt = $conn->prepare($sql3);
        $stmt->execute();
        $annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Encodage des données en JSON
        $annonces_json = json_encode($annonces);
        ?>

  
      </section>
	</main>
    </div>
</div>


</body>
