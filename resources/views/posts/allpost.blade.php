@extends('home')

@section('content')
@if(Session::has('message'))
	 {{Session::get('message')}}
  @endif
      <div 
<div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
        <p>
			<a href="{{route('write.post')}}" class="btn btn-danger">Add Post</a>
			<a href="{{route('all.post')}}" class="btn btn-info">All Post</a>
			
		</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
       <table class="table table-responsive">
			<tr>
				<th>Sl</th>
				<th>Category</th>
				<th>Title</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
			@foreach($post as $c)
			<tr>
				<td>{{$c->id}}</td>
				<td>{{$c->cat_name}}</td>
				<td>{{$c->title}}</td>
				<td><img src="{{URL::to($c->image)}}" style="height:50px"></td>
				<td>
					<a href="{{URL::to('post/edit/'.$c->id)}}" class="btn btn-sm btn-info">Edit</a>
					<a href="{{URL::to('post/delete/'.$c->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
					<a href="{{URL::to('post/view/'.$c->id)}}" class="btn btn-sm btn-success">View</a>
				</td>
			</tr>
			@endforeach
	   </table>
	   
      </div>
    </div>
@endsection