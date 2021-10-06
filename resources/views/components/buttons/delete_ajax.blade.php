<button type="button" class="btn btn-sm btn-danger"
        onclick="helper.confirmationDeleteWithAjax('{{url($url)}}', '{{$message}}')"
        data-toggle="tooltip" data-placement="top" title="{{$title}}" {{ $attributes }}>
    <i class="{{$icon}}"></i>
</button>
