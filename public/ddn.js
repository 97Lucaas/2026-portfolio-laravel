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

window.addEventListener('DOMContentLoaded', function() {

    var agediv = this.document.getElementById("age");
    agediv.innerHTML = ""+age();

})