function mostrarMensaje(tipoMensaje, contenido) {
    $("#texto-mensaje").html(contenido);
    if (tipoMensaje === "success") {
        $("#icono-mensaje").css({
            'background-image': "url('/Imagenes/success.png')",
            'color': ''
        });
        $("#texto-mensaje").css({
            'color': "#046704e8"
        });
    } else {
        $("#icono-mensaje").css({
            'background-image': "url('/Imagenes/error.png')",
            'color': ''
        });
        $("#texto-mensaje").css({
            'color': "#dc3545"
        });
    }

    $("#mensaje-info").addClass("d-flex");
    $("#mensaje-info").show();
    $("#mensaje-info").css("animation-name", "mostrar-mensaje");

    setTimeout(function() {
        $("#mensaje-info").css("animation-name", "esconder-mensaje");
    }, 4000);
    setTimeout(function() {
        $("#mensaje-info").removeClass("d-flex");
        $("#mensaje-info").hide();
        window.history.replaceState({},
            "/" + window.location.href.split("?")[0]
        );
    }, 4790);
}