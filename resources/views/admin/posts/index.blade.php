<x-admin-layout title="blog // admin">
    <div class="admin-head">
        <div>
            <p class="admin-eyebrow">./ blog</p>
            <h1 class="admin-title">All posts</h1>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-senary">+ New post</a>
    </div>

    @if ($posts->isEmpty())
        <div class="admin-card admin-empty">
            <span class="text-comment">&gt;</span> no posts yet. <a class="text-link-custom" href="{{ route('admin.posts.create') }}">write the first one</a>.
        </div>
    @else
        <div class="admin-table">
            <div class="admin-table-head admin-table-head--posts">
                <span>title</span>
                <span>slug</span>
                <span>date</span>
                <span class="text-end">actions</span>
            </div>

            @foreach ($posts as $post)
                <div class="admin-table-row admin-table-row--posts">
                    <div class="admin-cell-title">
                        <span class="text-comment">./ </span>{{ $post->title }}
                    </div>

                    <div class="admin-cell-slug">{{ $post->slug }}</div>

                    <div class="admin-hint">{{ $post->created_at?->format('Y-m-d') }}</div>

                    <div class="admin-cell-actions">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-quaternary btn-sm">Edit</a>

                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                            onsubmit="return confirm('Delete “{{ $post->title }}”?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-admin-layout>