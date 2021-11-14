<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <form class="form" method="POST" id="registerForm">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold" id="modalRegisterForm">Criando uma conta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="col-form-label" for="nameInput">{{ __('Nome') }}</label>
                        <div class="input-group">
                            <input type="text" id="nameInput" name="name" class="form-control" placeholder="Nome" value="{{ old('name') }}" required>
                            <span class="invalid-feedback" role="alert" id="nameError">
                                <strong> </strong>
                            </span>
                        </div>
                    </div>
                    <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                        <label class="col-form-label" for="emailInput">{{ __('Email') }}</label>
                        <div class="input-group">
                            <input type="email" id="emailInput" name="email" class="form-control" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>
                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong> </strong>
                            </span>
                        </div>
                    </div>
                    <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                        <label class="col-form-label" for="passwordInput" for="password">{{ __('Senha') }}</label>
                        <div class="input-group">
                            <input type="password" id="passwordInput" name="password" class="form-control" placeholder="{{ __('Senha') }}" required>
                            <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong> </strong>
                            </span>
                        </div>
                    </div>
                    <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                        <label class=" col-form-label" for="password-confirm" for="password_confirmation">{{ __('Confirmar Senha') }}</label>
                        <div class="input-group">
                            <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" style="padding: 10px 50px 10px 50px" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </form>
</div>


@section('scripts')
    @parent

    <script>
        $(function () {
            $('#registerForm').submit(function (e) {
                e.preventDefault();
                let formData = $(this).serializeArray();
                $(".invalid-feedback").children("strong").text("");
                $("#registerForm input").removeClass("is-invalid");
                $.ajax({
                    method: "POST",
                    headers: {
                        Accept: "application/json"
                    },
                    url: "{{ route('register') }}",
                    data: formData,
                    success: () => window.location.assign("{{ route('welcome') }}"),
                    error: (response) => {
                        if(response.status === 422) {
                            console.log(response.responseJSON)
                            let errors = response.responseJSON.errors;
                            Object.keys(errors).forEach(function (key) {
                                $("#" + key + "Input").addClass("is-invalid");
                                $("#"+key+"Error").children("strong").text(errors[key][0]);
                            });
                        } else {
                            window.location.reload();
                        }
                    }
                })
            });
        })
    </script>
@endsection
