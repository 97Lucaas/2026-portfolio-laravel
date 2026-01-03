      // Configuration des particules
      particlesJS('particles-js', {
        "particles": {
          "number": {
            "value": 50, // Nombre de particules
            "density": {
              "enable": true,
              "value_area": 1000 // Zone de répartition des particules
            }
          },
          "color": {
            "value": "#fff" // Couleur des particules
          },
          "shape": {
            "type": "circle", // Forme des particules
            "stroke": {
              "width": 0,
              "color": "#000000"
            }
          },
          "opacity": {
            "value": 0.5, // Opacité des particules
            "random": true,
            "anim": {
              "enable": false,
              "speed": 1,
              "opacity_min": 0.1,
              "sync": false
            }
          },
          "size": {
            "value": 3, // Taille des particules
            "random": true,
            "anim": {
              "enable": false,
              "speed": 40,
              "size_min": 0.1,
              "sync": false
            }
          },
          "line_linked": {
            "enable": true,
            "distance": 150, // Distance de liaison entre les particules
            "color": "#fff", // Couleur des lignes entre les particules
            "opacity": 0.4,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 6, // Vitesse de déplacement des particules
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
              "enable": false,
              "rotateX": 600,
              "rotateY": 1200
            }
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": {
              "enable": false,
              "mode": "grab"
            },
            "onclick": {
              "enable": false,
              "mode": "push"
            },
            "resize": true
          },
          "modes": {
            "grab": {
              "distance": 140,
              "line_linked": {
                "opacity": 1
              }
            },
            "bubble": {
              "distance": 400,
              "size": 40,
              "duration": 2,
              "opacity": 8,
              "speed": 3
            },
            "repulse": {
              "distance": 200,
              "duration": 0.4
            },
            "push": {
              "particles_nb": 4
            },
            "remove": {
              "particles_nb": 2
            }
          }
        },
        "retina_detect": true
      });