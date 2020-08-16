@extends('home')

@section('content')
@section('content')
  
<div class="row">

      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
			<a href="{{route('write.post')}}" class="btn btn-danger">Add Post</a>
			<a href="{{route('all.post')}}" class="btn btn-info">All Post</a>
			
		</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
      <div>
			<ol>
				<li>Category Name:{{$post->cat_name}}</li>
				<li>Post Title: {{$post->title}}</li>
				<li>Deatils: {{$post->details}}</li>
				<li>Image: <img src="{{URL($post->image)}}" width="100"/></li>
			</ol>
			
	  </div>
	   
      </div>
    </div>
@endsection