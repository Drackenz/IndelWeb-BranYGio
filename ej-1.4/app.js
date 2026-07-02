const materias = [];

const form = document.getElementById("form-materia");

const tbody = document.querySelector("tbody");

const resultado = document.getElementById("resultado");

const estado = document.getElementById("estado");

const error = document.getElementById("error");

form.addEventListener("submit", function (e) {
  e.preventDefault();

  const datos = new FormData(form);

  const nombre = datos.get("nombre");

  const nota = parseFloat(datos.get("nota"));

  const peso = parseFloat(datos.get("peso"));

  let sumaPesos = materias.reduce((total, m) => total + m.peso, 0);

  if (sumaPesos + peso > 100) {
    error.textContent = "La suma de los pesos no puede ser mayor a 100%";

    return;
  }

  error.textContent = "";

  materias.push({
    nombre,

    nota,

    peso,
  });

  form.reset();

  renderizar();
});

function renderizar() {
  tbody.innerHTML = "";

  materias.forEach((materia, index) => {
    tbody.innerHTML += `

<tr>

<td>${materia.nombre}</td>

<td>${materia.nota.toFixed(1)}</td>

<td>${materia.peso}%</td>

<td>

<button class="eliminar" onclick="eliminar(${index})">

✕

</button>

</td>

</tr>

`;
  });

  calcularPromedio();

  console.log(materias);
}

function calcularPromedio() {
  if (materias.length === 0) {
    resultado.textContent = "0.00";

    estado.textContent = "";

    return;
  }

  let sumaNotas = 0;

  let sumaPesos = 0;

  materias.forEach((m) => {
    sumaNotas += m.nota * m.peso;

    sumaPesos += m.peso;
  });

  const promedio = sumaNotas / sumaPesos;

  resultado.textContent = promedio.toFixed(2);

  if (promedio >= 6) {
    estado.textContent = "✔ APROBADO";

    estado.className = "aprobado";
  } else {
    estado.textContent = "✘ REPROBADO";

    estado.className = "reprobado";
  }
}

function eliminar(indice) {
  materias.splice(indice, 1);

  renderizar();
}
