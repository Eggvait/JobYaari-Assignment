<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }}</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; max-width: 800px; margin: auto; }
        img { max-width: 100%; height: auto; border-radius: 8px; margin-bottom: 20px; }
        .meta { color: #666; margin-bottom: 20px; }
        a { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <a href="{{ route('home') }}">← Back to Blogs</a>
    <h1>{{ $blog->title }}</h1>
    <div class="meta">Category: {{ $blog->category }} | Date: {{ $blog->date }}</div>
    @if($blog->image)
        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image">
    @endif
    <div>
        {!! nl2br(e($blog->content)) !!}
    </div>
</body>
</html>