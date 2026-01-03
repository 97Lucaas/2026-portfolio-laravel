
  

  window.addEventListener('scroll', function() {
    var arrow = document.getElementById('arrow');
    var scrollPos = window.scrollY;

    // Calcul de l'opacité en fonction de la position de défilement
    var opacity = 1 - (scrollPos / 200); // 200 est la valeur de déclenchement du fondu (ajustez selon vos besoins)

    // Limiter l'opacité entre 0 et 1
    opacity = Math.min(1, Math.max(0, opacity));

    // Appliquer l'opacité à la flèche
    arrow.style.opacity = opacity.toString();

    // Affichage ou masquage de la flèche en fonction de l'opacité
    if (opacity > 0) {
      arrow.style.display = 'block';
    } else {
      arrow.style.display = 'none';
    }
  });

  // Ajoutez un événement de clic pour faire remonter vers le haut de la page
  document.getElementById('arrow').addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });












  window.addEventListener('DOMContentLoaded', function() {




    var arrow = document.getElementById('arrow');
    if (window.scrollY < 100) {
      arrow.style.display = 'block';
    } else {
      arrow.style.display = 'none';
    }
  });
  
  document.getElementById('arrow').addEventListener('click', function() {
    var destination = document.querySelector('#start').getBoundingClientRect().top + window.scrollY;
    window.scrollTo({
      top: destination,
      behavior: 'smooth'
    });
  });