
const indicator = document.querySelector("[data-indicator]")
/*
const inputFile = document.querySelector('#file');
const imgContainer = document.querySelector('.img-container');
const btnUpload = document.querySelector('.btn-upload');

btnUpload.addEventListener('click', function () {
  inputFile.click();
})

inputFile.addEventListener('change', function () {
  const images = this.files;
  const maxFiles = 10;
  if(images.length > maxFiles){
    alert(`Vous pouvez télécharger un maximum de ${maxFiles} fichiers`);
    return;
  }
  
  for(let i = 0; i < images.length; i++) {
    const image = images[i];
    if(image.size < 2000000) {
      const reader = new FileReader();
      reader.onload = ()=> {
        const imgUrl = reader.result;
        const img = document.createElement('img');
        img.src = imgUrl;
        imgContainer.appendChild(img);
      }
      reader.readAsDataURL(image);
    } else {
      alert("La taille de l'image est supérieure à 2 Mo");
    }
  }
})
*/

function retour(e){
  return document.getElementById(e);
}

document.addEventListener("click", e => {
  let anchor
  if (e.target.matches("a")) {
    anchor = e.target
  } else {
    anchor = e.target.closest("a")
  }
  if (anchor != null) {
    const allAnchors = [...document.querySelectorAll("a")]
    const index = allAnchors.indexOf(anchor)
    console.log(index)

    indicator.style.setProperty("--position", index)
    document.querySelectorAll("a").forEach(elem => {
      elem.classList.remove("active")
    })
    anchor.classList.add("active")
    if(indicator.style.getPropertyValue('--position') === '0'){
    document.getElementById("poster_annonce").style.display = "none";
    document.getElementById("profil").style.display = "none";
    document.getElementById("page_des_annonces").style.display = "block";
    document.getElementById("statistique").style.display = "none";
    }
    else if (indicator.style.getPropertyValue('--position') === '1') {
    document.getElementById("poster_annonce").style.display = "none";
    document.getElementById("profil").style.display = "block";
    document.getElementById("page_des_annonces").style.display = "none";
    document.getElementById("statistique").style.display = "none";
    }
    else if (indicator.style.getPropertyValue('--position') === '2'){
      document.getElementById("poster_annonce").style.display = "block";
    document.getElementById("profil").style.display = "none";
    document.getElementById("page_des_annonces").style.display = "none";
    document.getElementById("statistique").style.display = "none";
    }
    else if(indicator.style.getPropertyValue('--position') === '3'){
      document.getElementById("poster_annonce").style.display = "none";
    document.getElementById("profil").style.display = "none";
    document.getElementById("page_des_annonces").style.display = "none";
    document.getElementById("statistique").style.display = "block";
    }
    else if(indicator.style.getPropertyValue('--position') === '4'){
      document.getElementById("poster_annonce").style.display = "none";
    document.getElementById("profil").style.display = "none";
    document.getElementById("page_des_annonces").style.display = "none";
    document.getElementById("statistique").style.display = "none";
    setTimeout(function() {
      window.location.replace("login.php");
    }, 220);
    }


  }

})




function filtrerAnnonces() {
  // Récupérer les valeurs des éléments de sélection
  const categorie = selectCategorie.value;
  const tri = selectTri.value;
  const recherche = inputRecherche.value.toLowerCase();

  // Parcourir toutes les annonces et les stocker dans un tableau
  const annoncesArray = Array.from(annonces);

  // Trier les annonces en fonction du prix et de l'ordre de tri sélectionné
  annoncesArray.sort((a, b) => {
    const prixA = parseInt(a.querySelector('p').textContent);
    const prixB = parseInt(b.querySelector('p').textContent);
    if (tri === 'prix-asc') {
      return prixA - prixB;
    } else {
      return prixB - prixA;
    }
  });

  // Parcourir les annonces triées et les afficher ou les masquer en fonction des critères de recherche
  annoncesArray.forEach(annonce => {
    // Récupérer les informations de l'annonce
    const titre = annonce.querySelector('h2').textContent.toLowerCase();
    const prix = annonce.querySelector('p').textContent;
    const categorieAnnonce = annonce.dataset.categorie.toLowerCase();

    // Vérifier si l'annonce correspond aux critères de recherche
    const correspondRecherche = titre.includes(recherche) || categorieAnnonce.includes(recherche);
    const correspondCategorie = categorie === '' || categorieAnnonce === categorie;
    
    // Afficher ou masquer l'annonce en fonction des critères de recherche
    if (correspondRecherche && correspondCategorie) {
      annonce.style.display = 'block';
    } else {
      annonce.style.display = 'none';
    }
  });
}

// Écouteurs d'événements pour les sélections et la recherche
document.getElementById('categorie').addEventListener('change', afficherAnnonces);
document.getElementById('tri').addEventListener('change', afficherAnnonces);
document.getElementById('recherche').addEventListener('input', afficherAnnonces);






const inputFile1 = document.querySelector('#file1');

const btnUpload1 = document.querySelector('.m_a_j');

btnUpload.addEventListener('click', function () {
  inputFile.click();
})

inputFile.addEventListener('change', function () {
  const images = this.files;
  const maxFiles = 10;
  if(images.length > maxFiles){
    alert(`Vous pouvez télécharger un maximum de ${maxFiles} fichiers`);
    return;
  }
  
  for(let i = 0; i < images.length; i++) {
    const image = images[i];
    if(image.size < 2000000) {
      const reader = new FileReader();
      reader.onload = ()=> {
        const imgUrl = reader.result;
        const img = document.createElement('img');
        img.src = imgUrl;
        imgContainer.appendChild(img);
      }
    } else {
      alert("La taille de l'image est supérieure à 2 Mo");
    }
  }
})

