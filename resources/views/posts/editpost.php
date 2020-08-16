@extends('home')

@section('content')
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
			<a href="" class="btn btn-info">All category</a>
			<a href="{{route('all.post')}}" class="btn btn-info">All Post</a>
			
		</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data">
		@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" name="title" placeholder="Title" value="{{$post->title}}">
            </div>
          </div>

		  <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
				<select name="category_id" class="form-control">
					<option value="">Select</option>
					@foreach($cat as $c)
					@if($post->category_id==$c['id'])
						<option value="{{$c->id}}" selected>{{$c->name}}</option>
					@else
						<option value="{{$c->id}}">{{$c->name}}</option>
					@endif
					@endforeach
				</select>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control" name="image">
             
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea rows="5" class="form-control" name="details" placeholder="Details" value="{{$post->details}}"></textarea>
              
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
        </form>
      </div>
    </div>
@endsection