 @extends('welcome')
@section('content')
<div class="container">
 	<div class="row gx-4 gx-lg-5 justify-content-center">
 		<div class="col-md-10 col-lg-8 col-xl-7">
 			<a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
 			<a href="{{route('all.category')}}" class="btn btn-primary">All Category</a>

 			<div>
 				<ol>
 					<li>{{$category->name}}</li>
 					<li>{{$category->slug }}</li>
 				</ol>
 			</div>
 		</div>
 	</div>
 </div>
</div>
@endsection