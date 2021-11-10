<div class="modal fade" id="modalSenhaForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Alterar senha</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body mx-3">
                <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
                    @csrf
                    @method('put')
                    @if (session('status_password'))

                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('status_password') }}</span>
                        </div>
                    @endif
                    <label class=" col-form-label" for="input-current-password">{{ __('Atual Senha') }}</label>

                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input
                               type="password" name="old_password" id="input-current-password"
                               placeholder="{{ __('Atual Senha') }}" value="" required/>
                        @if ($errors->has('old_password'))
                            <span id="name-error" class="error text-danger"
                                  for="input-name">{{ $errors->first('old_password') }}</span>
                        @endif
                    </div>
                    <label class="col-form-label" for="input-password">{{ __('Nova senha') }}</label>

                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               id="input-password" type="password" placeholder="{{ __('Nova senha') }}" value=""
                               required/>
                        @if ($errors->has('password'))
                            <span id="password-error" class="error text-danger"
                                  for="input-password">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <label class="col-form-label"
                           for="input-password-confirmation">{{ __('Confirme a nova senha') }}</label>

                    <div class="form-group">
                        <input class="form-control" name="password_confirmation" id="input-password-confirmation"
                               type="password" placeholder="{{ __('Confirme a nova senha') }}" value="" required/>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" style="padding: 10px 50px 10px 50px" class="btn btn-primary">Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
