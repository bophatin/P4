
$(document).ready(function() {
	$('.js-scrollTo').on('click', function() { // Au clic sur un élément
		var page = $(this).attr('href'); // Page cible
		var speed = 900; // Durée de l'animation (en ms)
		$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
		return false; 
			// La méthode .offset() renvoie les coordonnées (relatives au document) de l’élément (ici la page ciblée). On modifie la position de la scrollbar (grâce à scrollTop) jusqu’à atteindre cet élément, en animant le défilement avec .animate()
	});
});
