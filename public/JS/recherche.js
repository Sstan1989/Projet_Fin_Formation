//Requête AJAX
'use strict';
console.log('ok');

let input = document.querySelector("#search");
console.log(input);
input.addEventListener('keyup', () => { // Ecoute d'évènement au keyup

    // Récupérer le text tapé dans l'input par l'utilisateur
    let textFind = document.querySelector('#search').value;
    console.log(textFind);
    // Faire un objet de type request
    if (textFind.length != 0) {
        let myRequest = new Request('index.php?route=ajax', {
            method: 'POST',
            body: JSON.stringify({ textToFind: textFind })
        })

        // On attend la réponse du fichier getArticle.php
        // Portez-vous à la ligne 229 pour suivre la logique du code et vous reviendrez ici pour lire la suite du code JS

        fetch(myRequest)
            // Récupère les données
            .then(res => res.text())

            // Exploite les données
            .then(res => {
                document.getElementById("target").innerHTML = res; // On met articles.phtml dans la div -> id=target
            })
    } else {
        document.getElementById("target").innerHTML = ""; // On met articles.phtml dans la div -> id=target
    }
})