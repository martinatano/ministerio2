$.ajax({
    url: 'https://api.github.com/users',
    method: 'GET',
    success: function (usuarios) {
        const miLista = $("#user");

        // Iterar sobre los usuarios y agregar un ítem a la lista por cada uno
        usuarios.forEach(function (usuario) {
            miLista.append("<li>" + usuario.login + "</li>");
        });
    },
    error: function () {
        console.error('Error al realizar la solicitud a la API de GitHub');
    }
});