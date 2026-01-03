// Simuler le chargement de la page (à remplacer par votre code de chargement réel)

var startTime = new Date().getTime();
var interval = 10000; // 10 secondes en millisecondes

let loadingSentences = ["Chargement en cours...","Un petit instant...","Encore quelques secondes...","C'est pas mon jour...","C'est lent ajourd'hui, c'est sur...","On y est presque !"];
var loops = 1;


function UpdateText(){
    
    var text = document.getElementById("loading_message");
    
    text.innerHTML = loadingSentences[loops-1]
    
    if(loops >= loadingSentences.length){
        loops = 1;
    }else{
        loops++;
    }
    
    setTimeout(UpdateText, interval)
}

setTimeout(UpdateText, 1000)

window.addEventListener('load', function() {
    if(true){
        const loader = document.querySelector('.loader-wrapper');
        const links = document.querySelectorAll('.link');

        console.log(links)

        links.forEach(el => {
            var thisHTML = el.innerHTML;
            el.innerHTML = '<span>'+thisHTML+'</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M206.783-100.782q-44.305 0-75.153-30.848-30.848-30.848-30.848-75.153v-546.434q0-44.305 30.848-75.153 30.848-30.848 75.153-30.848H480v106.001H206.783v546.434h546.434V-480h106.001v273.217q0 44.305-30.848 75.153-30.848 30.848-75.153 30.848H206.783ZM405.523-332 332-405.523l347.694-347.694H560v-106.001h299.218V-560H753.217v-119.694L405.523-332Z" fill="#ffffff"/></svg>'
        })
        //const mainContent = document.querySelector('.main-content');
    
        setTimeout(function() {
        loader.style.opacity = '0'; // Réduit l'opacité de l'écran de chargement
        //mainContent.classList.add('loaded'); // Affiche le contenu principal avec un fondu
        setTimeout(function() {
            loader.style.display = 'none'; // Masque l'écran de chargement après le fondu
        }, 500); // Délai correspondant à la durée de la transition (0.5s = 500ms)
        }, 50); // Temps de simulation du chargement
    }
    
    
    
    
    
    
  });
  