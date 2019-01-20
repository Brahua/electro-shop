@extends('layout')

@section('main')
    <div class="section">
        <div class="container">
            <div class="row">
                <div style="display: flex; justify-content: center;">
                    <div class="col-md-6">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="billing-details">
                                <div class="section-title text-center">
                                    <h3 class="title">Registrate</h3>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="input" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombres">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input class="input" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Apellidos" required>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="email" class="input" name="email" value="{{ old('email', $email) }}" required placeholder="Email">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="text" class="input" name="username" value="{{ old('username') }}" required placeholder="Nombre de usuario">

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="password" class="input" name="password" required placeholder="Contraseña">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="password" class="input" name="password_confirmation" required placeholder="Repetir Contraseña">
                                </div>
                                
                                <div class="form-group">
                                    <input class="input" type="text" name="address" value="{{ old('address') }}" placeholder="Dirección" required>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input class="input" type="text" name="city" value="{{ old('city') }}" placeholder="Ciudad" required>

                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input class="input" type="text" name="country" value="{{ old('country') }}" placeholder="País" required>

                                    @if ($errors->has('country'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input class="input" type="tel" name="phone" value="{{ old('phone') }}" placeholder="Telefono" required>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="primary-btn">
                                        Registrarme
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
