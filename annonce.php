<?php
      $conn = new PDO("mysql:host=localhost;dbname=site_web;port=3306;charset=utf8", 'root', '');

      $sql="SELECT * FROM annonce where id=:id_annonce";//la requette qui permet d importer des information de la base de donnee
      $cherche=$conn->prepare($sql);
      $cherche->bindParam(':id_annonce',$_GET["id_annonce"]);
	  $cherche->execute();

	  $result = $cherche->fetch(PDO :: FETCH_ASSOC);

	  $img1 = $result["photo1"];
	  $img2 = $result["photo2"];
	  $img3 = $result["photo3"];
	  $img4 = $result["photo4"];
	  $img5 = $result["photo5"];
	  $img6 = $result["photo6"];

	  $img1 = base64_encode($img1);
	  $img2 = base64_encode($img2);
	  $img3 = base64_encode($img3);
	  $img4 = base64_encode($img4);
	  $img5 = base64_encode($img5);
	  $img6 = base64_encode($img6);

	  $sql3="SELECT * FROM user where id=:id_user";//la requette qui permet d importer des information de la base de donnee
      $cherche1=$conn->prepare($sql3);
      $cherche1->bindParam(':id_user',$_GET["id_user"]);
	  $cherche1->execute();

	  $result1 = $cherche1->fetch(PDO :: FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Annonce de vente d'appartement</title>
	<link rel="stylesheet" type="text/css" href="annonce.css">
</head>
<body>
	<div class="container">
		<h1><?php echo $result["titre"]; ?></h1>
		<div class="annonce">
		<div class="title2"><h2>Appartement a loue a <?php echo $result["ville_app"] ?></h2></div>
            <div class="slideshow-container">
	            <div class="mySlides fade">
				<?php
       	 			echo '<img src="data:image/jpeg;base64,' . $img1 . '" />';
        		?>
	            </div>

	            <div class="mySlides fade">
				<?php
       	 			echo '<img    src="data:image/jpeg;base64,' . $img2 . '" />';
        		?>
	            </div>

	            <div class="mySlides fade">
				<?php
       	 			echo '<img    src="data:image/jpeg;base64,' . $img3 . '" />';
        		?>
	            </div>

				<div class="mySlides fade">
				<?php
       	 			echo '<img  src="data:image/jpeg;base64,' . $img4 . '" />';
        		?>
	            </div>

				<div class="mySlides fade">
				<?php
       	 			echo '<img  src="data:image/jpeg;base64,' . $img5 . '" />';
        		?>
	            </div>

				<div class="mySlides fade">
				<?php
       	 			echo '<img src="data:image/jpeg;base64,' . $img6 . '" />';
        		?>
	            </div>

	        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	        <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
			<div class="title">Position</div>
			<p>Ville : <?php echo $result["ville_app"] ?></p>
            <p>Secteur : <?php echo $result["secteur_app"] ?></p>
			<div class="title">Equipement</div>
			<p>Nombre de pièces : <?php echo $result["nb_chambre"] ?> </p>
			<p>Salle de bain : <?php echo $result["salle_de_bain"] ?></p>
			<p>Sallon : <?php echo $result["salon"] ?></p>
			<p>Etage : <?php echo $result["etage"] ?></p>
			<p>Age du bien : <?php echo $result["age_de_app"] ?></p>
			<div class="title">Superficie</div>
			<p>Surface : <?php echo $result["surface"] ?> </p>
			<div class="title">Prix</div>
			<p><?php echo $result["prix"]." DH" ?></p>
			<div class="title">Commentaire</div>
			<p><?php echo $result["commentaire"] ?></p>
			<form action="annonce.php" method="get">
			<input type="hidden" name="id_user" value="<?php echo $result1["id"]; ?>">
			<input type="hidden" name="id_annonce" value="<?php echo $result["id"]; ?>">

			<div class="button">
          	<input type="submit" name="sub" value="Reserver">
        </div>
			</form>
		</div>
	</div> 
    <?php
// se connecter à la base de données
$conn1 = mysqli_connect("localhost","root","","site_web");
if (!$conn1) {
	die("Connection failed: " . mysqli_connect_error());
}

// récupérer l'ID de l'annonce à partir du formulaire
if(isset($_GET['sub'])){
	$id_user = $_GET['id_user'];
	$id_annonce = $_GET['id_annonce'];

	
	// insérer l'annonce dans la base de données
	$sql2="INSERT INTO reservation (id_user,id_annonce) VALUES ('$id_user','$id_annonce')";
	if (mysqli_query($conn1, $sql2)) {
	echo "Annonce réservée avec succès.";
} else {
	echo "Erreur: " . mysqli_error($conn1);
}

}
?>


	<script src="annonce.js"></script>
</body>
</html>
