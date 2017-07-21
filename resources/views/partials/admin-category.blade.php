<li>#<strong>{{ $category->id}}</strong> <a href="">{{ $category->name}}</a><button class="btn-xs btn-danger"><a href="{{ route('admin.category.delete', ['id' => $category->id]) }}"> X</a></button></li>
	@if (count($category->children) > 0)
	    <ul>
	    @foreach($category->children as $category)
	        @include('partials.admin-category', $category)
	    @endforeach
	    </ul>
	@endif