<!-- Modal -->
<div class="modal fade" id="modalModalAccion" tabindex="-1" role="dialog" aria-labelledby="modalModalAccionTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModalAccionTitle" v-text="(StatusProcess == 'reverse') ? 'Reservar Liquidacion' : 'Aprobar Liquidacion'"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">
                <form action="{{route('liquidaction.process')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="liquidation_id" :value="CommissionsDetails.liquidation_id">
                    <input type="hidden" name="action" :value="StatusProcess">
                    <h5>Usuario: <strong v-text="CommissionsDetails.username"></strong></h5>
                    <h5>Total: <strong v-text="CommissionsDetails.total"></strong></h5>

                    <div class="form-group" v-if="StatusProcess == 'aproved'">
                        <label for="">Hash</label>
                        <input type="text" name="hash" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Comentario</label>
                        <textarea name="commentary" class="form-control" :required="(StatusProcess == 'reverse') ? true : false"></textarea>
                    </div>
                    <div class="col-12 my-2">
                        <label class="custom-file-label" for="img"><b>Subir imagen</b></label>
                        <input type="file" id="img" class="form-control border border-info rounded" name="img"
                            onchange="previewFile(this, 'photo_preview')" accept="image/*" />
                    </div>
                    <div class="row mb-4 mt-4 d-none" id="photo_preview_wrapper">
                        <div class="col"></div>
                        <div class="col-auto">
                        <img id="photo_preview" class="img-fluid rounded" />
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" v-text="(StatusProcess == 'reverse') ? 'Reservar' : 'Aprobar'"></button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

