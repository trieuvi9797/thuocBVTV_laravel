@foreach($parentCategories as $category)
 
  {{ $category->name }}

    @if(count($category->parent))
        @include('client.categoryTree',['childrents' => $category->parent])
    @endif
 
@endforeach

