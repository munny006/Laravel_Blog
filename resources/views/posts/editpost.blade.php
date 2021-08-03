 @extends('welcome')
@section('content')
<div class="container">
 	<div class="row gx-4 gx-lg-5 justify-content-center">
 		<div class="col-md-10 col-lg-8 col-xl-7">
 			
 			<a href="{{route('all.post')}}" class="btn btn-warning">All Post</a>
 			<form action="{{url('update/post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
 				@csrf
 				<div class="form-floating">
 					<input class="form-control" name="title" type="text" value="{{$post->title}}" required>
 					<label for="title">Post Ttile</label>

 				</div>
 				
 					<select class="form-control" name="category_id">
 						@foreach($category as $row)
 						<option value="{{$row->id}}" <?php if($row->id == $post->category_id) echo "selected";?>>{{$row->name}}</option>
 						@endforeach()

 					</select>


 				<div class="form-floating">

 					<input class="form-control" name="image" type="file"required><br>
 					Old Image : <img src="{{URL::to($post->image)}}" style="height: 40px;width: 80px;">
 					<label for="image">New Image</label><br>
 					<input type="hidden" name="old_photo" value="{{$post->image}}">

 				</div>
 				<br>
 				<div class="form-floating">
 					<textarea class="form-control" name="details" placeholder="Enter your message here..." style="height: 7rem" required>{{$post->details}}</textarea>
 				</div>
 				<br>

 				<button class="btn btn-success text-uppercase " name="button"  type="submit"> Update </button>
 				<br>
 			</form>
 			<br>
 		</div>
 	</div>
 </div>

</div>
@endsection