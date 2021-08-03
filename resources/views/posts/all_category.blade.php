 @extends('welcome')
@section('content')
<div class="container">
 	<div class="row gx-4 gx-lg-5 justify-content-center">
 		<div class="col-md-10 col-lg-8 col-xl-7">
 			<a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
 			<a href="{{route('all.category')}}" class="btn btn-primary">All Category</a>
 			<br><br>
 			<hr>
 			<br>
 			<table class="table table-bordered">
 				<tr  class="text-center">
 					<th width="7%">SL</th>
 					<th width="35%">Category name</th>
 					<th width="15%">Slug name</th>
 					<th width="36%">Action</th>
 				</tr>
 				@foreach($category as $row)
 				<tr class="text-center">
 					<td>{{$row->id}}</td>
 					<td>{{$row->name}}</td>
 					<td>{{$row->slug}}</td>
 					<td>
 						<a href="{{URL::to('edit/category/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
 						<a href="{{URL::to('delete/category/'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
 						<a href="{{URL::to('view/category/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
 					</td>
 				</tr>
 				@endforeach
 				
 			</table>
 			<br>
 		</div>
 	</div>
 </div>


@endsection