 @extends('welcome')
@section('content')
<div class="container">
 	<div class="row gx-4 gx-lg-5 justify-content-center">
 		<div class="col-md-10 col-lg-8 col-xl-7">
 			<a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
 			<a href="{{route('all.category')}}" class="btn btn-primary">All Category</a>

 			<form action="{{route('store.category')}}" method="POST">
 				@csrf
 				<div class="form-floating">
 					<input class="form-control" name="name" type="text" placeholder="Category Name" required>
 					<label for="name">Category Name</label>

 				</div>
 					<div class="form-floating">
 					<input class="form-control" name="slug" type="text" placeholder="Slug" required>
 					<label for="slug">Slug</label>

 				</div>
 					
 				
 				<br />

 				<button class="btn btn-warning  text-uppercase "type="submit"> Submit </button>
 				<br>
 			</form>
 			<br>
 		</div>
 	</div>
 </div>
</div>
@endsection