@extends('front.layout')

@section('content')
<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">

				@foreach($posts as $post)

				<article class="post">
					<div class="post-thumb">
						<a href="{{route('post.show', $post->slug)}}"><img src="{{$post->getImage()}}" alt=""></a>

						<a href="{{route('post.show', $post->slug)}}" class="post-thumb-overlay text-center">
							<div class="text-uppercase text-center">Читать пост</div>
						</a>
					</div>
					<div class="post-content">
						<header class="entry-header text-center text-uppercase">
							<h6><a href="#">{{$post->category->title}}</a></h6>

							<h1 class="entry-title"><a href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h1>


						</header>
						<div class="entry-content">
							{{$post->description}}

							<div class="btn-continue-reading text-center text-uppercase">
								<a href="{{route('post.show', $post->slug)}}" class="more-link">Читать пост</a>
							</div>
						</div>
						<div class="social-share">
							<span class="social-share-title pull-left text-capitalize">		Автор - {{$post->author->name}}
								<br>
								Дата - {{$post->getDate()}}
							</span>
							
						</div>
					</div>
				</article>

				@endforeach

				{{$posts->links()}}

			</div>
			@include('front.pages.sidebar')
		</div>
	</div>
</div>
@endsection