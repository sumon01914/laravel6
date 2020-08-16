@extends('home')

@section('content')
@if(Session::has('message'))
	 {{Session::get('message')}}
  @endif
      <div 
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
			<a href="{{route('add.category')}}" class="btn btn-danger">Add category</a>
			<a href="" class="btn btn-info">All category</a>
			
		</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
       <table class="table table-responsive">
			<tr>
				<th>Sl</th>
				<th>Category Name</th>
				<th>Slug</th>
				<th>Action</th>
			</tr>
			@foreach($category as $c)
			<tr>
				<td>{{$c->id}}</td>
				<td>{{$c->name}}</td>
				<td>{{$c->slug}}</td>
				<td>
					<a href="{{URL::to('category/edit/'.$c->id)}}" class="btn btn-sm btn-info">Edit</a>
					<a href="{{URL::to('category/delete/'.$c->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
					<a href="{{URL::to('category/view/'.$c->id)}}" class="btn btn-sm btn-success">View</a>
				</td>
			</tr>
			@endforeach
	   </table>
	   
      </div>
    </div>
@endsection