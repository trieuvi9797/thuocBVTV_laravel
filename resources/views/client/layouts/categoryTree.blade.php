@foreach($parent_categories as $category)
 
  {{ $category->name }}

    @if(count($category->subCategory))
        @include('client.layouts.header',['subCategories' => $category->subCategory])
    @endif
 
@endforeach

