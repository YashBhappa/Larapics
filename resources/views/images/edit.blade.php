<h1>Edit image</h1>

<div>
    <form action="{{ route('images.update', $image->id) }}" method="POST">
        @csrf
        @method('PUT')
        <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width=400>
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $image->title) }}">
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Update</button>
    </form>
</div>
