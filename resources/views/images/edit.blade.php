<x-layout title="Update Image">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Update image</div>
                    <div class="card-body">
                        <x-form action="{{ route('images.update', $image->id) }}" method="PUT"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" class="img-fluid">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="title">Photo Title</label>
                                <input class="form-control @error('title') is-invalid @enderror " type="text"
                                    name="title" id="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    <div class="invalid-feedback">
                                        Title is required
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label" for="title">Photo Tags</label>
                                <input type="text" class="form-control">
                                <div class="form-text">
                                    Separate your tags with comma
                                </div>
                            </div> --}}
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('images.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
