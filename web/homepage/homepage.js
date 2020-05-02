var pokeArray = [];

function fetchPokemon() {
  for (let i = 1; i < 151; i++) {
    const url = "https://pokeapi.co/api/v2/pokemon/" + i;
    fetch(url)
      .then(response => {
        return response.json();
      })
      .then(data => {
        const pokemon = {
          name: data.name,
          id: data.id,
          image: data.sprites["front_default"],
          type: data.types.map(type => type.type.name).join(", ")
        };
        pokeArray[i - 1] = pokemon;
      });
  }
}

function displayPokemon() {
  setTimeout(function() {
    for (let i = 0; i < 150; i++) {
      const pokeInnerHTML = `
      <div class="flex-item" onclick="selectPokemon(${pokeArray[i].id})">
      <div class="img-container">
          <img src="https://pokeres.bastionbot.org/images/pokemon/${
            pokeArray[i].id
          }.png" alt="${pokeArray[i].name}" />
      </div>
      <div class="info">
          <span class="number">#${pokeArray[i].id
            .toString()
            .padStart(3, "0")}</span>
          <h3 class="name">${pokeArray[i].name.toUpperCase()}</h3>
          <small>Type: <span>${pokeArray[i].type}</span></small>
      </div>
      </div>
    `;

      const pokeCard = document.createElement("div");
      const pokedex = document.getElementById("pokedex");

      pokeCard.innerHTML = pokeInnerHTML;
      pokedex.appendChild(pokeCard);
    }
  }, 3000);
}

function selectPokemon(id) {
  const url = "https://pokeapi.co/api/v2/pokemon/" + id;
  fetch(url)
    .then(response => {
      return response.json();
    })
    .then(data => {
      const pokemon = {
        name: data.name,
        id: data.id,
        image: data.sprites["front_default"],
        type: data.types.map(type => type.type.name).join(", "),
        height: data.height,
        base_exp: data.base_experience,
        stats: data.stats
      };
      createPopup(pokemon);
    });
}

function createPopup(pokemon) {
  const pokedex = document.getElementById("pokedex");
  const html = `
  <div class="popup">
  <button class="closeBtn" onclick="closePopup()">Close</button>
  <div class="popup-img-container">
    <img src="https://pokeres.bastionbot.org/images/pokemon/${
      pokemon.id
    }.png" alt="${pokemon.name}" />
  </div>
  <div class="infoPopup">
    <span class="number">#${pokemon.id.toString().padStart(3, "0")}</span>
    <h3 class="name">${pokemon.name.toUpperCase()}</h3>
    <small class="type">Type: ${pokemon.type.toUpperCase()}</small><br>
    <small class="type">Height: ${pokemon.height}</small><br>
    <small class="type">Base Experience: ${pokemon.base_exp}</small><br>
    <small class="type">Hitpoints: ${pokemon.stats[5].base_stat}</small><br>
    <small class="type">Attack: ${pokemon.stats[4].base_stat}</small><br>
    <small class="type">Defense: ${pokemon.stats[3].base_stat}</small><br>
    <small class="type">Spec Defense: ${pokemon.stats[1].base_stat}</small><br>
    <small class="type">Spec Attack: ${pokemon.stats[2].base_stat}</small><br>
    <small class="type">Speed: ${pokemon.stats[0].base_stat}</small>
  </div>
  </div>
`;
  pokedex.innerHTML = html + pokedex.innerHTML;
}

function closePopup() {
  const popup = document.querySelector(".popup");
  popup.parentElement.removeChild(popup);
}

fetchPokemon();
displayPokemon();