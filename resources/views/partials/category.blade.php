<li><a href="{{ route('search.lawyers.bycategory', ['id' => $category->id]) }}">{{ $category->name}}</a></li>
	@if (count($category->children) > 0)
	    <ul>
	    @foreach($category->children as $category)
	        @include('partials.category', $category)
	    @endforeach
	    </ul>
	@endif