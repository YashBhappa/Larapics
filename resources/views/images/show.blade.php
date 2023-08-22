<h1>{{ $image->title }}</h1>

<div>
    <a href="">
        <img src="{{ $image->fileUrl() }}" alt="{{ $image->name }}">
    </a>
</div>
