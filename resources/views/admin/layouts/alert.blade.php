
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
{{-- Login fail --}}
@if (Session::has('error'))
    <div class="text-center alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

{{-- Login success  --}}
@if (Session::has('success'))
    <div class="text-center alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif