function actualizarFecha(id) {

    $.ajax({
        url: '/peluqueria/actualizarUltimaVisita/' + id,
        type: 'GET',
        success: (response) => {
            let res = JSON.parse(response);
            if(res == true){
                location.reload();
            }else{
                $("#error_actualizar_peluqueria").removeClass('d-none');
            }
        }
    });
}
