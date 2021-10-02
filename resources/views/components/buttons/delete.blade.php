<form action="{{url($url)}}" method="post"  style="display: contents">
    @method('DELETE')
    @csrf
    <button type="button" class="btn btn-sm btn-danger"
            data-toggle="tooltip" data-placement="top" title="{{$title}}" {{ $attributes }}>
        <i class="material-icons">{{$icon}}</i>
    </button>
</form>
