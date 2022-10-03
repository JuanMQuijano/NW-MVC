document.addEventListener("DOMContentLoaded", () => {
  mostrarAlerta();
});

const menu = document.querySelector("#menu");
const enlaces = document.querySelector("#enlaces");

menu.addEventListener("click", navegacionResponsive);

function navegacionResponsive() {
  enlaces.classList.toggle("mostrar");
}

const addCar = document.querySelector("#addCar");
addCar.onclick = mostrarAlerta;

function mostrarAlerta() {
  const contenedorAlerta = document.querySelector("#contenedorAlerta");
  const alerta = document.createElement("H1");
  alerta.textContent = "Producto Agregado Correctamente";
  alerta.style = "margin: 2rem auto";
  alerta.classList.add("car_alerta");
  contenedorAlerta.append(alerta);

  setTimeout(() => {
    contenedorAlerta.remove();
  }, 3000);
}
