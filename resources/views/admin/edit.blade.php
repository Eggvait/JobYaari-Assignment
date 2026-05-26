<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Blog</title>
    <style>
        body { font-family: sans-serif; padding: 20px; max-width: 600px; margin: auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="date"], select, textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 15px; background: #ffc107; color: black; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Edit Blog</h1>
    <a href="{{ route('admin.index') }}">← Back to Dashboard</a>
    <br><br>
    <form action="{{ route('admin.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group"><label>Title</label><input type="text" name="title" value="{{ $blog->title }}" required></div>
        <div class="form-group">
            <label>Category</label>
            <select name="category" required>
                <option value="Admit Card" {{ $blog->category == 'Admit Card' ? 'selected' : '' }}>Admit Card</option>
                <option value="Result" {{ $blog->category == 'Result' ? 'selected' : '' }}>Result</option>
                <option value="Jobs" {{ $blog->category == 'Jobs' ? 'selected' : '' }}>Jobs</option>
            </select>
        </div>
        <div class="form-group"><label>Date</label><input type="date" name="date" value="{{ $blog->date }}" required></div>
        <div class="form-group"><label>Short Description</label><textarea name="short_description" required rows="3">{{ $blog->short_description }}</textarea></div>
        <div class="form-group"><label>Full Content</label><textarea name="content" required rows="10">{{ $blog->content }}</textarea></div>
        <div class="form-group">
            <label>Current Image</label>
            @if($blog->image) <img src="{{ asset('storage/' . $blog->image) }}" width="100"><br> @endif
            <label>Upload New Image (Optional)</label><input type="file" name="image">
        </div>
        <button type="submit">Update Blog</button>
    </form>
</body>
</html>