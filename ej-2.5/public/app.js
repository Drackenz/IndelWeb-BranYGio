// Contador de caracteres en el textarea del formulario
const contenido = document.getElementById("contenido");
const contador = document.getElementById("contador");

if (contenido && contador) {
  contador.textContent = contenido.value.length + " caracteres";

  contenido.addEventListener("input", () => {
    contador.textContent = contenido.value.length + " caracteres";
  });
}

// Búsqueda en vivo dentro de la lista de apuntes
const buscador = document.getElementById("buscador");
const lista = document.getElementById("lista-apuntes");

if (buscador && lista) {
  const tarjetas = lista.querySelectorAll(".apunte-card");

  buscador.addEventListener("input", () => {
    const texto = buscador.value.toLowerCase();

    tarjetas.forEach((tarjeta) => {
      const contenidoTarjeta = tarjeta.textContent.toLowerCase();

      if (contenidoTarjeta.includes(texto)) {
        tarjeta.style.display = "block";
      } else {
        tarjeta.style.display = "none";
      }
    });
  });
}
