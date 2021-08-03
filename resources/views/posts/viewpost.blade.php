 @extends('welcome')
@section('content')
<div class="container">
 	<div class="row gx-4 gx-lg-5 justify-content-center">
 		<div class="col-md-10 col-lg-8 col-xl-7">
 			
 			<div>
 				
 					<h3>{{$post->title}}</h3>
 					<img src="{{URL::to($post->image)}}" height="340px">
 					<p>{{$post->name}}</p>
 					<p>{{$post->details}}</p>
 					
 				
 			</div>
 		</div>
 	</div>
 </div>
</div>
@endsection