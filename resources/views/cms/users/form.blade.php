@extends('cms.layout.container')
@section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('cms') }}">POČETNA</a>
            </li>
            <li class="breadcrumb-item active">Korisnici</li>
        </ol>
        <h1>Korisnici</h1>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="@if(!$editing) {{ url('cms/users') }} @else {{ url('cms/users/'.$user->id) }} @endif">
                    @csrf
                    @if($editing) @method('PUT') @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Ime</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Ime" value="{{ old('name', $user->name) }}" {!! $errors->has('name') ? 'style="border-color:red;"' : '' !!}>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail" value="{{ old('email', $user->email) }}" {!! $errors->has('email') ? 'style="border-color:red;"' : '' !!}>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Lozinka</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Lozinka" {!! $errors->has('password') ? 'style="border-color:red;"' : '' !!}>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation">Potvrda lozinke</label>
                                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Potvrda lozinke">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="is_active" value="1" {{ (($errors->any() && old('is_active') || (!$errors->any() && $user->is_active))) ? 'checked' : '' }}> Aktivan?
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="email_notifications" value="1" {{ (($errors->any() && old('email_notifications') || (!$errors->any() && $user->email_notifications))) ? 'checked' : '' }}> E-Mail obavještenja?
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger mb-3">Sačuvaj</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3 ml-auto" style="margin-left: 10px">Odustani</a>
                </form>
            </div>
        </div>
@endsection