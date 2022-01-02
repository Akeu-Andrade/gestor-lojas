<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <form class="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label class=" col-form-label" for="email">{{ __('Email') }}</label>
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}"
                                   value="{{ old('email') }}" required>
                        </div>
                        @if ($errors->has('email'))
                            <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                        <label class=" col-form-label" for="password">{{ __('Senha') }}</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="{{ __('senha...') }}" required>
                        </div>
                        @if ($errors->has('password'))
                            <div id="password-error" class="error text-danger pl-3" for="password"
                                 style="display: block;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-check mr-auto ml-3 mt-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"
                                   name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember me') }}
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" style="padding: 10px 50px 10px 50px" class="btn btn-primary">Login</button>
                    <a href="" data-toggle="modal" data-target="#modalRegisterForm" style="padding: 5px"> Registrar-se </a>
                </div>
            </div>
        </div>
    </form>
</div>

@section('scripts')
    @parent
    @if($errors->has('email') || $errors->has('password'))
        <script>
            $(function() {
                $('#modalLoginForm').modal({
                    show: true
                });
            });
        </script>
    @endif
@endsection
