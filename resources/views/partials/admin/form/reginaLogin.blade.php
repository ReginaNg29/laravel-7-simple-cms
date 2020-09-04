<section class="hero is-primary">
<div class="container">
    <div class="columns is-multiline">
        <div class="column is-12">
            <div class="column is-vcentered">
                <div class="column is-9">
                    <div class="content">
                        {{ Form::open(array('url' => 'loginReginas')) }}
                        <p>
                            {{ $errors->first('email') }}
                            {{ $errors->first('password') }}
                        </p>

                        <p>
                            {{ Form::label('email', 'Email Address') }}
                            {{ Form::text('email', Request::old('email'), array('placeholder' => 'email@email.com')) }}
                        </p>

                        <p>
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password') }}
                        </p>

                        <p>
                            {{ Form::submit('Login', ['class' => 'button']) }}
                        </p>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>