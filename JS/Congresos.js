// MGTI. Eduardo Palacios Manubes
document.addEventListener('DOMContentLoaded', function () {
    // Cargar los congresos al cargar la página
    cargarCongresos();

    // Manejar el envío del formulario
    const formulario = document.getElementById('congresoForm');
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();

        // Obtener los datos del formulario
        const nombre = document.getElementById('nombre').value;
        const fechaInicio = document.getElementById('fecha_inicio').value;
        const fechaFin = document.getElementById('fecha_final').value;

        // Enviar los datos a GuardaCongreso.php
        fetch('PHP/GuardaCongreso.php', {
            method: 'POST',
            body: new URLSearchParams({
                nombre: nombre,
                fecha_inicio: fechaInicio,
                fecha_final: fechaFin
            })
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            formulario.reset();
            cargarCongresos();
        })
        .catch(error => {
            console.error('Error al guardar el congreso:', error);
        });
    });
});

// Función para cargar los congresos
function cargarCongresos() {
    fetch('PHP/CargaCongreso.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#congresosTable tbody');
            tableBody.innerHTML = ''; //Aquí limpio la tabla antes de volver a cargar todo

            if (data.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="4">No hay congresos registrados.</td></tr>';
            } else {
                data.forEach(congreso => {
                    const row = `
                        <tr>
                            <td>${congreso.IDCongreso}</td>
                            <td>${congreso.Nombre}</td>
                            <td>${new Date(congreso.FechaInicio).toLocaleDateString()}</td>
                            <td>${new Date(congreso.FechaFin).toLocaleDateString()}</td>
                        </tr>
                    `;
                    tableBody.innerHTML += row;
                });
            }
        })
        .catch(error => {
            console.error('Error al cargar los congresos:', error);
        });
}