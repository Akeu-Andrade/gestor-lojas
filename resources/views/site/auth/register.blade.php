<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <form class="form" method="POST"
          action="{{ route('register') }}"
    >
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Criando uma conta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class=" col-form-label" for="name">{{ __('Nome') }}</label>
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ old('name') }}" required>
                        </div>
                        @if ($errors->has('name'))
                            <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                        <label class=" col-form-label" for="email">{{ __('Email') }}</label>
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>
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
                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Senha') }}" required>
                        </div>
                        @if ($errors->has('password'))
                            <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                        <label class=" col-form-label" for="password_confirmation">{{ __('Confirmar Senha') }}</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" style="padding: 10px 50px 10px 50px" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </form>
</div>
