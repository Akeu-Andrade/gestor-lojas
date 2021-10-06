<form action="{{url($url)}}" method="post"  style="display: contents">
    @method('DELETE')
    @csrf
    <button type="button" class="btn btn-sm btn-danger"
            onclick="helper.confirmationForm(this.form, '{{$message}}')"
            data-toggle="tooltip" data-placement="top" title="{{$title}}" {{ $attributes }}>
        <i class="material-icons">{{$icon}}</i>
    </button>
</form>
