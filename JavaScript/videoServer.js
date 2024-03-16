let ipAddress;

// Función para manejar el envío del formulario
function handleFormSubmit(event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

    // Obtiene la dirección IP del formulario
    ipAddress = document.getElementById('ipAddress').value;

    alert('Dirección IP guardada con éxito: ' + ipAddress);

    // Almacena localmente
    localStorage.setItem('video_server', ipAddress);
}


// Agrega un evento de escucha para el envío del formulario
document.getElementById('ipForm').addEventListener('submit', handleFormSubmit);
