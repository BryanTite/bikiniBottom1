  
      // Obtenemos la fecha actual
      const fechaActual = new Date();
      const mesActual = fechaActual.getMonth();
      const añoActual = fechaActual.getFullYear();

      // Generamos las filas y columnas del calendario
      let filas = "";
      for (let i = 0; i < 6; i++) {
        let columnas = "";
        for (let j = 0; j < 7; j++) {
          columnas += `<td></td>`;
        }
        filas += `<tr>${columnas}</tr>`;
      }
      document.querySelector("#calendario tbody").innerHTML = filas;

      // Obtenemos el primer y último día del mes actual
      const primerDiaMes = new Date(añoActual, mesActual, 1).getDay();
      const ultimoDiaMes = new Date(añoActual, mesActual + 1, 0).getDate();

      // Rellenamos el calendario con los días del mes actual
      let dia = 1;
      for (let i = 0; i < 6; i++) {
        for (let j = 0; j < 7; j++) {
          const celda = document.querySelector(`#calendario tbody tr:nth-child(${i + 1}) td:nth-child(${j + 1})`);
          if (i === 0 && j < primerDiaMes) {
            // Celdas vacías antes del primer día del mes
            celda.textContent = "";
          } else if (dia > ultimoDiaMes) {
            // Celdas vacías después del último día del mes
            celda.textContent = "";
          } else {
            // Días del mes actual
            celda.textContent = dia;
            celda.addEventListener("click", () => {
              alert(`Has seleccionado el día ${dia}/${mesActual + 1}/${añoActual}`);
            });
            dia++;
          }
        }
      }
    