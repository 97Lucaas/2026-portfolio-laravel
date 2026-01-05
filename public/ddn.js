function age(){

    // Date de naissance (format: 'YYYY-MM-DD')
    const dateNaissance = new Date('2003-01-06');

    // Date actuelle
    const dateActuelle = new Date();

    // Calcul de l'âge
    const diffAnnees = dateActuelle.getFullYear() - dateNaissance.getFullYear();
    const moisActuel = dateActuelle.getMonth();
    const moisNaissance = dateNaissance.getMonth();

    // Vérification si l'anniversaire a déjà eu lieu cette année
    if (moisActuel < moisNaissance || (moisActuel === moisNaissance && dateActuelle.getDate() < dateNaissance.getDate())) {
    return (diffAnnees - 1); // Si l'anniversaire n'a pas encore eu lieu cette année
    } else {
    return diffAnnees; // Si l'anniversaire a déjà eu lieu cette année
    }

}

function today(){

    // Date de naissance (format: 'YYYY-MM-DD')
    const dateNaissance = new Date('2003-01-06');

    // Date actuelle
    const dateActuelle = new Date();

    // Calcul de l'âge
    const diffAnnees = dateActuelle.getFullYear() - dateNaissance.getFullYear();
    const moisActuel = dateActuelle.getMonth();
    const moisNaissance = dateNaissance.getMonth();

    const jourNaissance = dateNaissance.getDate();
    const jourActuel = dateActuelle.getDate();

    // Vérification si l'anniversaire a déjà eu lieu cette année
    if (moisActuel == moisNaissance && jourActuel == jourNaissance) {
    return true; // Si l'anniversaire n'a pas encore eu lieu cette année
    } else {
    return false; // Si l'anniversaire a déjà eu lieu cette année
    }

}

window.addEventListener('DOMContentLoaded', function() {

    var agediv = this.document.getElementById("age");
    var spanAge = this.document.getElementById("span-age");

    if(today()){
        spanAge.classList.add("bday-bg");
    }

    agediv.innerHTML = ""+age();

})