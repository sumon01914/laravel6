@extends('home')
@section('content')
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
	  @foreach($post as $p)
        <div class="post-preview">
          <a href="">
            <h2 class="post-title">
			{{$p->title}}
            </h2>
            <h3 class="post-subtitle">
			{{$p->details}}
            </h3>
          </a>
          <p class="post-meta"><img src="{{URL::to($p->image)}}" width="100"/>
           </p>
        </div>
	@endforeach
        <hr>
       
        <!-- Pager -->
        <div class="clearfix">
		{{$post->links()}}
        </div>
      </div>
    </div>
@endsection