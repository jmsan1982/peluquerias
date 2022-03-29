function actualizarFecha(id) {

    $.ajax({
        url: '/peluqueria/actualizarUltimaVisita/' + id,
        type: 'GET',
        success: (response) => {
            let res = JSON.parse(response);
            reloadError(res);
        }
    });
}

function actualizarInteresa(id){
    $.ajax({
        url: 'peluqueria/actualizarInteresa/' + id,
        type: 'GET',
        success: (response) => {
            let res = JSON.parse(response);
            reloadError(res);
        }
    });
}

function reloadError(res){
    if(res == true){
        location.reload();
    }else{
        $("#error_actualizar_peluqueria").removeClass('d-none');
    }
}
