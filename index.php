<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carte Yu-Gi-Oh!</title>
</head>
<body>

	<h1>Carte Yu-Gi-Oh!</h1>

	<form id="cardForm">
		<label for="cardId">Nom de la Carte:</label>
		<input type="text" id="cardName" name="cardName">
		<button type="submit">Rechercher</button>
	</form>

	<div id="cardDetails"></div>
	<div id="carteAffichee"></div>

	<script>
		//C'est encore en cours de projet donc y a pleins de code commenté, de chose à upgrade, etc. Les images que je vais chercher sont en local mais à terme elles seront sur un serv, idem pour le json
		fetch('cardinfo.json')
			.then(response => response.json())
			.then(data => {
				const cardForm = document.getElementById('cardForm');
				const cardDetails = document.getElementById('cardDetails');

				cardForm.addEventListener('submit', function(event) {
					event.preventDefault();

					const cardName = document.getElementById('cardName').value;

					//const card = data.data.find(c => c.name === cardName);
					//console.log(card.id);

					//var imgElement = document.createElement("img");
					//imgElement.src = "/yugiho/images/"+card.id;
					//imgElement.alt = "Carte";

					//document.getElementById('carteAffichee').innerHTML = "";
					//document.getElementById('carteAffichee').appendChild(imgElement);

					/*if (card) {
						const cardHTML = 
						`<h2>${card.name}</h2>
						<p>Type de carte: ${card.type}</p>
						<p>Attribut de la carte: ${card.attribute}</p>`;
						cardDetails.innerHTML = cardHTML;
					} else {
						cardDetails.innerHTML = "Aucune carte trouvée avec cet ID.";
					}*/
				function nameFilter(searchChar) {
					return data.data.filter(function (element) {
						var nameLower = element.name.toLowerCase();
						var searchCharLower = searchChar.toLowerCase();
						return nameLower.includes(searchCharLower);
					});
				}

				var res = nameFilter(cardName);

				console.log(res[0]);
				for (var i = res.length - 1; i >= 0; i--) {
					console.log(res[i].id);
				}
			});
		}).catch(error => {
			console.error("Erreur JSON:", error);
		});
  </script>

</body>
</html>