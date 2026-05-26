@forelse($blogs as $blog)
    <div class="blog-card">
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
        @else
            <div style="width: 100%; height: 220px; background: #e5e7eb; border-bottom: 3px solid #2563eb; display: flex; align-items: center; justify-content: center; color: #9ca3af;">No Image</div>
        @endif
        
        <div class="card-content">
            <span class="category-badge">{{ $blog->category }}</span>
            <h3>{{ $blog->title }}</h3>
            <div class="meta-date">Published: {{ \Carbon\Carbon::parse($blog->date)->format('M d, Y') }}</div>
            <p>{{ Str::limit($blog->short_description, 100) }}</p>
            <a href="{{ route('blog.show', $blog->id) }}" class="btn">Read Full Article</a>
        </div>
    </div>
@empty
    <div class="no-results">
        <h3>No updates found</h3>
        <p>Try adjusting your filters to see more results.</p>
    </div>
@endforelse