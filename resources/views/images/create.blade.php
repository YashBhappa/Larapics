<h1>Upload an image</h1>

<div>
    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="file">File</label>
            <input type="file" accept="image/*" name="file" id="file">
            @error('file')
                <div class="">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>



        <button type="submit">Upload</button>
    </form>
</div>
