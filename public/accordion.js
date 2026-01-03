// Sélectionnez tous les éléments d'accordéon
const accordions = document.querySelectorAll('.accordion');

// Parcourez chaque accordéon
accordions.forEach(function(accordion) {
  // Ajoutez un gestionnaire d'événements pour chaque accordéon
  accordion.addEventListener('click', function() {
    this.classList.toggle('opened');
  });
});
