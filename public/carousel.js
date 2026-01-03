document.addEventListener('DOMContentLoaded', function() {
  const carouselContainers = document.querySelectorAll('.carousel-container');

  carouselContainers.forEach(function(container) {
    console.log("found carousel");
    const carousel = container.querySelector('.carousel');
    const prevButton = container.querySelector('.prev');
    const nextButton = container.querySelector('.next');

    if (!carousel || !prevButton || !nextButton) {
      console.error("Les éléments nécessaires n'ont pas été trouvés.");
      return;
    }
    console.log("found  utilities");

    let currentIndex = 0;
    let touchStartX = 0;
    let touchEndX = 0;
    let timer;  // Variable pour stocker le timer

    function showSlide(index) {
      carousel.style.transform = `translateX(-${index * 100}%)`;
      resetTimer();  // Réinitialiser le timer à chaque changement de slide
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % carousel.children.length;
      showSlide(currentIndex);
    }

    function prevSlide() {
      currentIndex = (currentIndex - 1 + carousel.children.length) % carousel.children.length;
      showSlide(currentIndex);
    }

    function handleTouchStart(event) {
      touchStartX = event.touches[0].clientX;
      resetTimer();
    }

    function handleTouchMove(event) {
      touchEndX = event.touches[0].clientX;
    }

    function handleTouchEnd() {
      const deltaX = touchEndX - touchStartX;

      if (deltaX > 0) {
        prevSlide();
      } else if (deltaX < 0) {
        nextSlide();
      }
    }

    function resetTimer() {
      clearInterval(timer);  // Effacer le timer existant
      timer = setInterval(nextSlide, 9000);  // Redémarrer le timer
    }
    
    function resetTimerByInteraction() {
      clearInterval(timer);  // Effacer le timer existant
      timer = setInterval(nextSlide, 30000);  // Redémarrer le timer à 30 s car il y a eu une interaction
    }

    nextButton.addEventListener('click', function() {
      nextSlide();
      resetTimerByInteraction();
    });

    prevButton.addEventListener('click', function() {
      prevSlide();
      resetTimerByInteraction();
    });

    console.log('slides:', carousel.children.length);
    // Autoplay initial
    resetTimer();

    // Ajout des gestionnaires d'événements tactiles
    carousel.addEventListener('touchstart', handleTouchStart);
    carousel.addEventListener('touchmove', handleTouchMove);
    carousel.addEventListener('touchend', handleTouchEnd);
  });
});
