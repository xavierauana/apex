<div class="form-group">
	{{Form::label('firstname', "First Name")}}
	{{Form::text('firstname', null, ["class"=>"form-control", "required"])}}
	{{$errors->first('firstname', '<span class="errors"> :message </span>')}}
</div>
<div class="form-group">
	{{Form::label('lastname', "Last Name")}}
	{{Form::text('lastname', null, ["class"=>"form-control", "required"])}}
	{{$errors->first('lastname', '<span class="errors"> :message </span>')}}
</div>
<div class="form-group">
	{{Form::label('email', "Email")}}
	{{Form::email('email', null, ["class"=>"form-control", "disabled"])}}
	{{$errors->first('email', '<span class="errors"> :message </span>')}}
</div>
<div class="form-group">
	{{Form::label('username', "User Name")}}
	{{Form::text('username', null, ["class"=>"form-control", "required"])}}
	{{$errors->first('username', '<span class="errors"> :message </span>')}}
</div>
{{Form::submit('Update', ["class" => "btn btn-block btn-success" , "id" => "edit-confirm-button"])}}
<a href="{{route('users.index')}}" class="btn btn-info btn-block">Back</a>