const btn = document.getElementById("btn-buscar");

const input = document.getElementById("input-nombre");

const resultado = document.getElementById("resultado");

btn.addEventListener("click", () => {
  buscarPokemon(input.value.trim().toLowerCase());
});

input.addEventListener("keydown", (e) => {
  if (e.key === "Enter") {
    buscarPokemon(input.value.trim().toLowerCase());
  }
});

async function buscarPokemon(nombre) {
  if (nombre === "") {
    resultado.innerHTML = "<p class='error'>Escribe un nombre.</p>";

    return;
  }

  resultado.innerHTML = "<p class='cargando'>Cargando...</p>";

  try {
    const respuesta = await fetch(
      `https://pokeapi.co/api/v2/pokemon/${nombre}`,
    );

    if (!respuesta.ok) {
      throw new Error("No se encontró ese Pokémon.");
    }

    const data = await respuesta.json();

    mostrarPokemon(data);
  } catch (error) {
    resultado.innerHTML = `<p class="error">${error.message}</p>`;
  }
}

function mostrarPokemon(pokemon) {
  const tipos = pokemon.types

    .map((t) => t.type.name)

    .join(", ");

  const estadisticas = pokemon.stats

    .map((s) => `<li>${s.stat.name}: ${s.base_stat}</li>`)

    .join("");

  resultado.innerHTML = `

<div class="poke">

<h2>${pokemon.name.toUpperCase()}</h2>

<img src="${pokemon.sprites.other["official-artwork"].front_default}">

<p><strong>Tipos:</strong> ${tipos}</p>

<p><strong>Peso:</strong> ${pokemon.weight / 10} kg</p>

<p><strong>Altura:</strong> ${pokemon.height / 10} m</p>

<h3>Estadísticas</h3>

<ul>

${estadisticas}

</ul>

</div>

`;
}
