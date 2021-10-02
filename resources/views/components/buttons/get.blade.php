<a
    href="{{url($url)}}"
    type="button"
    class="btn btn-sm {{ $classes != '' ? $classes : 'btn-default' }}"
    data-placement="top"
    data-toggle="tooltip"
    data-original-title="{{$title}}"
    {{ $attributes }}>
    <i class="material-icons">{{$icon}}</i>
</a>

