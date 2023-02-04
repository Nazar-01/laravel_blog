<div class="col-md-4" data-sticky_column>
	<div class="primary-sidebar">

		<aside class="widget news-letter">

			<h3 class="widget-title text-uppercase text-center">Подпишись на обновления</h3>

			<form action="{{route('subscribe')}}" method="post">
				{{csrf_field()}}
				<input type="email" placeholder="Email" name="email">
				<input type="submit" value="Отправить email"
				class="text-uppercase text-center btn btn-subscribe">
			</form>

		</aside>
		<aside class="widget">
			<h3 class="widget-title text-uppercase text-center">Популярные посты</h3>


			@foreach($popularPosts as $popularPost)
			<div class="popular-post">

				<a href="{{route('post.show', $popularPost->slug)}}" class="popular-img"><img src="{{$popularPost->getImage()}}" alt="">

					<div class="p-overlay"></div>
				</a>

				<div class="p-content">
					<a href="{{route('post.show', $popularPost->slug)}}" class="text-uppercase">{{$popularPost->title}}</a>
					<span class="p-date">{{$popularPost->date}}</span>

				</div>
			</div>
			@endforeach

		</aside>
		<aside class="widget">
			<h3 class="widget-title text-uppercase text-center">Рекомендованные посты</h3>

			<div id="widget-feature" class="owl-carousel">

				@foreach($featuredPosts as $featuredPost)
				<div class="item">
					<div class="feature-content">
						<img src="{{$featuredPost->getImage()}}" alt="">

						<a href="{{route('post.show', $featuredPost->slug)}}" class="overlay-text text-center">
							<h5 class="text-uppercase">{{$featuredPost->title}}</h5>
						</a>
					</div>
				</div>
				@endforeach
			</div>
		</aside>
		<aside class="widget pos-padding">
			<h3 class="widget-title text-uppercase text-center">Недавние посты</h3>

			@foreach($recentPosts as $recentPost)

			<div class="thumb-latest-posts">


				<div class="media">
					<div class="media-left">
						<a href="{{route('post.show', $recentPost->slug)}}" class="popular-img"><img src="{{$recentPost->getImage()}}" alt="">
							<div class="p-overlay"></div>
						</a>
					</div>
					<div class="p-content">
						<a href="{{route('post.show', $recentPost->slug)}}" class="text-uppercase">{{$recentPost->title}}</a>
						<span class="p-date">{{$recentPost->date}}</span>
					</div>
				</div>
			</div>

			@endforeach
			
		</aside>
		<aside class="widget border pos-padding">
			<h3 class="widget-title text-uppercase text-center">Категории</h3>
			<ul>

				@foreach($categories as $category)

				<li>
					<a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
					<span class="post-count pull-right">{{$category->posts()->count()}}</span>
				</li>

				@endforeach
			</ul>
		</aside>
		<aside class="widget border pos-padding">
			<h3 class="widget-title text-uppercase text-center">Теги</h3>
			<ul>

				@foreach($tags as $tag)

				<li>
					<a href="{{route('tag.show', $tag->slug)}}">{{$tag->title}}</a>
					<span class="post-count pull-right">{{$tag->posts()->count()}}</span>
				</li>

				@endforeach
			</ul>
		</aside>
	</div>
</div>