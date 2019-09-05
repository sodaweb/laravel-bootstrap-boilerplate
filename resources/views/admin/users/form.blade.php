<div class="row">
    <div class="input-field col s12 tooltipped" data-position="top" data-delay="50" data-tooltip="O endereço de e-mail não pode ser modificado.">
        {!! Form::text('email', null, ['class' => '', 'disabled']) !!}
        {!! Form::label('email', 'E-mail', ['class' => '']) !!}
    </div>
    <div class="input-field col s12">
        {!! Form::text('name', null, ['class' => '']) !!}
        {!! Form::label('name', 'Name', ['class' => '']) !!}
    </div>
    <div class="col s12">
      <label>
            {!! Form::checkbox('admin', null, $user->admin, ['id' => 'admin', 'class' => 'filled-in']) !!}
            <span>General Admin</span>
        </label>
    </div>
    &nbsp;<small class="pull-left">General admins can create and remove other users.</small>
        
</div>
<div class="row center-align">
    {!! Form::submit('Save changes', ['class' => 'btn green']) !!}
    <a href="{{ route('admin.users.index') }}" class="btn">Return</a>
</div>