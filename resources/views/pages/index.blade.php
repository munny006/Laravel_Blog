@extends('welcome')
@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        @foreach($post as $row)
        <!-- Post preview-->
        <div class="post-preview">
            <a href="post.html">
                <h2 class="post-title">
                    {{$row->title}}
                </h2>
                <img src="{{URL::to($row->image)}}" style="height: 300px;">
                <p class="post-meta"> Category
                    Posted by
                    <a href="#!">{{$row->name}}</a>
                    on slug {{$row->slug}} 
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @endforeach
          {{$post->links()}}


            <!-- Pager
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>-->
        </div>

    </div>

    @endsection