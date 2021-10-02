<form target="_blank" action="{{$url}}" type="get">
    @csrf
    <div class="row">
        <div class="col-md-12">
            {!! $filtro !!}
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <button type="submit" class="btn btn-success" style="margin-right: 10px;">
                <i class="fa fa-file"></i>
                Gerar
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
    </div>
</form>
