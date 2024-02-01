// Attend que le document soit chargé
$(document).ready(function() {

    // Associe un événement de soumission au formulaire
    $('#loginForm').submit(function(event) {
        // Empêche la soumission par défaut du formulaire
        event.preventDefault();
      // Récupère les valeurs du formulaire
      var username = $('#username').val();
      var password = $('#password').val();
  
      // Effectue une requête Ajax vers le script serveur de traitement du formulaire
      $.ajax({
        url: 'logics/logic_login.php',    // L'URL du script serveur qui traite le formulaire
        method: 'POST',      // Méthode HTTP (POST dans cet exemple)
        data: {              // Les données du formulaire à envoyer
          username: username,
          password: password
        },
        success: function(data) {
          // Met à jour le contenu de l'élément avec l'ID "result" avec la réponse du serveur
          $('#result').html(data);
        },
         error: function(jqXHR, textStatus, errorThrown) {
                // Récupère le code d'erreur HTTP
                var status = jqXHR.status;
            
                // Affiche un message en fonction du code d'erreur
                if (status === 404) {
                  alert('Le script serveur n\'a pas été trouvé.');
                } else if (status === 500) {
                  alert('Erreur interne du serveur. Veuillez réessayer plus tard.');
                } else {
                  alert('Une erreur s\'est produite lors de la soumission du formulaire. Code d\'erreur : ' + status);
                }
              
        }
      });
    });
  
  });