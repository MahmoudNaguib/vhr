@include('form.input',['name'=>'name','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Name'),'placeholder'=>trans('app.Name'),'autocomplete'=>"off",'required'=>1]])

@include('form.input',['name'=>'email','type'=>'email','attributes'=>['class'=>'form-control','label'=>trans('app.Email'),'placeholder'=>trans('app.Email'),'autocomplete'=>"off",'required'=>1]])

@include('form.input',['name'=>'mobile','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Mobile'),'placeholder'=>trans('app.Mobile'),'autocomplete'=>"off",'required'=>1]])

@include('form.password',['name'=>'password','attributes'=>['class'=>'form-control','label'=>trans('app.Password'),'placeholder'=>trans('app.Password'),'required'=>(@$row->id)?false:true]])

@include('form.password',['name'=>'password_confirmation','attributes'=>['class'=>'form-control','label'=>trans('app.Password confirmation'),'placeholder'=>trans('app.Password confirmation'),'required'=>(@$row->id)?false:true]])

