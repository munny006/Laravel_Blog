 @extends('welcome')
@section('content')
<div class="container">
 	<div class="row gx-4 gx-lg-5 justify-content-center">
 		<div class="col-md-10 col-lg-8 col-xl-7">
 			<a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
 			<a href="{{route('all.category')}}" class="btn btn-primary">All Category</a>
@if (Session::has('success'))
  <div class="alert alert-success" style="margin-top:0" role="alert">
    <center><strong>Success: </strong>{{ Session::get('success')}}</center>
  </div>
@endif
@if (count($errors) >0)
  <div class="alert alert-danger"style="margin-top:4.9em" role="alert">
    <strong>Errors:</strong>
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif  
 			<form action="{{url('update/category/'.$category->id)}}" method="POST">
 				@csrf
 				<div class="form-floating">
 					<input class="form-control" name="name" type="text" value="{{$category->name}}" required>
 					<label for="name">Category Name</label>

 				</div>
 					<div class="form-floating">
 					<input class="form-control" name="slug" type="text" value="{{$category->slug}}" required>
 					<label for="slug">Slug</label>

 				</div>
 					
 				
 				<br />

 				<button class="btn btn-primary  text-uppercase "type="submit"> Update </button>
 				<br>
 			</form>
 			<br>
 		</div>
 	</div>
 </div>
</div>
@endsection