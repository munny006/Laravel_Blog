 @extends('welcome')
@section('content')
<div class="container">
 	<div class="row gx-4 gx-lg-5 justify-content-center">
 		<div class="col-md-10 col-lg-12 col-xl-7">
 			
 			<a href="{{route('write.post')}}" class="btn btn-primary">Write Post</a>
 			<br><br>
 			<hr>
 			<br>
 			<table class="table table-bordered">
 				<tr  class="text-center">
 					<th width="2%">SL</th>
 					<th width="20%">Category name</th>
 					<th width="20%">Title</th>
 					<th width="15%">Image</th>
 					<th width="50%">Action</th>
 				</tr>
 				@foreach($category as $row)
 				<tr class="text-center">
 					<td>{{$row->id}}</td>
 					<td>{{$row->name}}</td>
 					<td>{{$row->title}}</td>
 					<td><img src="{{URL::to($row->image)}}" style="height: 40px;width: 70px"></td>
 					<td>
 						<a href="{{URL::to('edit/post/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
 						<a href="{{URL::to('delete/post/'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
 						<a href="{{URL::to('view/post/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
 					</td>
 				</tr>
 				@endforeach
 				
 			</table>
 			<br>
 		</div>
 	</div>
 </div>


@endsection