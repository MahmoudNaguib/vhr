@include('form.input',['name'=>'title','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Title'),'placeholder'=>trans('app.Title'),'autocomplete'=>"off",'required'=>1]])

@include('form.input',['name'=>'users_count','type'=>'number','attributes'=>['class'=>'form-control','label'=>trans('app.Users count'),'placeholder'=>trans('app.Users count'),'autocomplete'=>"off",'step'=>'1','required'=>1,'min'=>1]])

@include('form.input',['name'=>'unlock_count','type'=>'number','attributes'=>['class'=>'form-control','label'=>trans('app.Unlock count'),'placeholder'=>trans('app.Unlock count'),'autocomplete'=>"off",'step'=>'1','required'=>1,'min'=>1]])

@include('form.input',['name'=>'posts_count','type'=>'number','attributes'=>['class'=>'form-control','label'=>trans('app.Posts count'),'placeholder'=>trans('app.Posts count'),'autocomplete'=>"off",'step'=>'1','required'=>1,'min'=>1]])

@include('form.input',['name'=>'duration_in_month','type'=>'number','attributes'=>['class'=>'form-control','label'=>trans('app.Duration in month'),'placeholder'=>trans('app.Duration in month'),'autocomplete'=>"off",'step'=>'1','required'=>1,'min'=>1]])

@include('form.input',['name'=>'price','type'=>'number','attributes'=>['class'=>'form-control','label'=>trans('app.Price'),'placeholder'=>trans('app.Price'),'autocomplete'=>"off",'step'=>'0.01','required'=>1,'min'=>1]])
