/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';


  // Récupérer la date actuelle
  var date = new Date();

  // Obtenir les composantes de la date
  var jour = date.getDate();
  var mois = date.getMonth() + 1; // Les mois commencent à partir de 0 (janvier=0)
  var annee = date.getFullYear();

  // Mettre à jour l'élément avec la date du jour
  document.getElementById("dateDuJour").innerHTML = jour + "/" + mois + "/" + annee;




