 @extends('welcome')
@section('content')
<div class="container">
 	<div class="row gx-4 gx-lg-5 justify-content-center">
 		<div class="col-md-10 col-lg-8 col-xl-7">
 			<a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
 			<a href="{{route('all.category')}}" class="btn btn-primary">All Category</a>
 			<a href="{{route('all.post')}}" class="btn btn-warning">All Post</a>
 			<form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data">
 				@csrf
 				<div class="form-floating">
 					<input class="form-control" name="title" type="text" placeholder="Title" required>
 					<label for="title">Post Ttile</label>

 				</div>
 				
 					<select class="form-control" name="category_id">
 						@foreach($category as $row)
 						<option value="{{$row->id}}">{{$row->name}}</option>
 						@endforeach()

 					</select>

 				

 				<div class="form-floating">
 					<input class="form-control" name="image" type="file"required>


 				</div>
 				<div class="form-floating">
 					<textarea class="form-control" name="details" placeholder="Enter your message here..." style="height: 7rem" required></textarea>
 					<label for="message">Details</label>

 				</div>
 				<br />

 				<button class="btn btn-success text-uppercase " name="button"  type="submit"> Send </button>
 				<br>
 			</form>
 			<br>
 		</div>
 	</div>
 </div>

</div>
@endsection