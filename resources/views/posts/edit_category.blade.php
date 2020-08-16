@extends('home')

@section('content')
  @if(Session::has('message'))
	 {{Session::get('message')}}
  @endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
			<a href="{{route('add.category')}}" class="btn btn-danger">Add category</a>
			<a href="{{route('category.all')}}" class="btn btn-info">All category</a>
			
		</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form action="{{url('category/update/'.$cat->id)}}" method="POST">
		@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Title</label>
              <input type="text" name="name" value="{{$cat->name}}" class="form-control" placeholder="Title" >
            </div>
          </div>
		  <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug</label>
              <input type="text" name="slug" value="{{$cat->slug}}" class="form-control" placeholder="Slug" >
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
@endsection