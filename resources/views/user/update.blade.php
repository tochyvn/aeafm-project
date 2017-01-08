      

<div class="row">

    <div class="panel-heading">s'incrire</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="sex" class="col-md-4 control-label">sex</label>
                <div class="col-md-6">                        
                    <label class="radio-inline"  ><input type="radio" name="sex"  >Mme</label>
                    <label class="radio-inline" ><input type="radio" name="sex">Mlle</label>
                    <label class="radio-inline" ><input type="radio" name="sex">M</label>

                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">nom</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name" class="col-md-4 control-label">prénom</label>

                <div class="col-md-6">
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                    @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <label for="status" class="col-md-4 control-label">staut</label>

                <div class="col-md-6">
                    <select name="role" class="form-control">
                        <option>----select----</option>
                        <option value="1"> étudiant                            
                        </option>
                        <option value="2">particulier</option>
                    </select>


                    @if ($errors->has('status'))
                    <span class="help-block">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('country_origin_id') ? ' has-error' : '' }}">
                <label for="country_origin_id" class="col-md-4 control-label">pays d'origine</label>

                <div class="col-md-6">
                    <select name="country_origin_id" class="form-control">
                        <option>----select----</option>
                        <option value="1"> cameroun                            
                        </option>
                        <option value="2">senégal</option>
                    </select>


                    @if ($errors->has('country_origin_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('country_origin_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('country_residence_id') ? ' has-error' : '' }}">
                <label for="country_residence_id" class="col-md-4 control-label">pays de résidence </label>

                <div class="col-md-6">
                    <select name="country_residence_id" class="form-control">
                        <option>----select----</option>
                        <option value="1"> france                            
                        </option>
                        <option value="2">senégal</option>
                    </select>


                    @if ($errors->has('country_residence_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('country_residence_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                <label for="town" class="col-md-4 control-label">ville</label>

                <div class="col-md-6">
                    <input id="town" type="text" class="form-control" name="town" value="{{ old('town') }}" required>

                    @if ($errors->has('town'))
                    <span class="help-block">
                        <strong>{{ $errors->first('town') }}</strong>
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Email</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">mot de passe</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirmer le mot de passe </label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        s'incrire
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



