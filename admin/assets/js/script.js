function notification(msg,color) {
    $("#alert").html(
        '<div id="warn" class="alert alert-' +
            color +
            ' alert-dismissible fade show" role="alert"><i class="fa-solid fa-circle-exclamation"></i> ' +
            msg +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
    );
    setTimeout(function () {
        $("#warn").fadeOut("slow");
    }, 1500); // <-- time in milliseconds
}