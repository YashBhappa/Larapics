<h1>All Images</h1>

<a href="{{ route('images.create') }}">Upload an image</a>
<div>
    @if ($message = session('message'))
        <div>{{ $message }}</div>
    @endif
</div>
@foreach ($images as $image)
    <p>{{ $image->name }}</p>

    <a href="{{ $image->permalink() }}">
        <img src="{{ $image->fileUrl() }}" alt="{{ $image->name }}" width="200">
    </a>
    <div>
        <a href="{{ route('images.edit', $image->id) }}">Edit </a>
        <form action="{{ route('images.destroy', $image->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach
