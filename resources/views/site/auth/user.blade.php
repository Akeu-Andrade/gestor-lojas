<div class="modal fade" id="modalUserForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Meu Pefil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body mx-3">
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <label class=" col-form-label">{{ __('Name') }}</label>
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                               id="input-name" type="text" placeholder="{{ __('Name') }}"
                               value="{{ old('name', !empty(auth()->user()) ? auth()->user()->name : '') }}"
                               required="true" aria-required="true"/>
                        @if ($errors->has('name'))
                            <span id="name-error" class="error text-danger"
                                  for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <label class="col-form-label">{{ __('Email') }}</label>
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               id="input-email" type="email" placeholder="{{ __('Email') }}"
                               value="{{ old('email', !empty(auth()->user()) ? auth()->user()->email : '') }}"
                               required/>
                        @if ($errors->has('email'))
                            <span id="email-error" class="error text-danger"
                                  for="input-email">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <label class="col-form-label">{{ __('Número de Whatsapp') }}</label>
                    <div class="form-group{{ $errors->has('numero') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control{{ $errors->has('numero') ? ' is-invalid' : '' }}"
                               onkeypress="$(this).mask('(00) 0000-00009')" name="numero" id="input-numero" required placeholder="{{ __('Número') }}"
                               value="{{ old('numero', !empty(auth()->user()) ? auth()->user()->numero : '') }}"/>
                        @if ($errors->has('numero'))
                            <span id="numero-error" class="error text-danger"
                                  for="input-numero">{{ $errors->first('numero') }}</span>
                        @endif
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" style="padding: 10px 50px 10px 50px" class="btn btn-primary">Salvar
                        </button>
                    </div>
                </form>
                <a href="" data-toggle="modal" data-target="#modalSenhaForm" style="padding: 5px"> Alterar senha </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="padding: 5px">
                    @csrf
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                       style="color: red"> Sair </a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</div>
