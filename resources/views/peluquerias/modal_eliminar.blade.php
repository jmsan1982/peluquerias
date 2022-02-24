<!-- The Modal -->
<div class="modal" id="modal_aliminar_peluqueria">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Borrar Peluqueria</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                ¿Estas seguro de que quieres eliminar la Peluqueria?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                <form action="{{ route('peluquerias.destroy', $peluqueria->id) }}" method="POST">
                    @csrf
                    @method("DELETE")

                    <button type="submit" class="btn btn-danger">
                        Eliminar
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>
