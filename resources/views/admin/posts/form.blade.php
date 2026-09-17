@php
    $editing = $post->exists;
    $action = $editing ? route('admin.posts.update', $post) : route('admin.posts.store');
@endphp

<x-admin-layout :title="($editing ? 'edit' : 'new') . ' post // admin'">
    <div class="admin-head">
        <div>
            <p class="admin-eyebrow">./ blog {{ $editing ? '/ edit' : '/ new' }}</p>
            <h1 class="admin-title">{{ $editing ? 'Edit post' : 'New post' }}</h1>
        </div>
        <a href="{{ route('admin.posts.index') }}" class="admin-back">&larr; back to list</a>
    </div>

    <div class="admin-card">
        <form action="{{ $action }}" method="POST" class="admin-form">
            @csrf
            @if ($editing)
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="title" class="form-label"><span class="text-comment">./ </span>title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                @error('title') <div class="admin-error">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label"><span class="text-comment">./ </span>category <span class="admin-hint">(pick one or type your own — optional)</span></label>
                <input type="text" class="form-control" id="category" name="category" list="post-category-list" value="{{ old('category', $post->category) }}" maxlength="255" autocomplete="off">
                <datalist id="post-category-list">
                    <option value="Web Development"></option>
                    <option value="Agentic AI"></option>
                    <option value="Java"></option>
                    <option value="Laravel"></option>
                    <option value="DevOps"></option>
                    <option value="Tutorial"></option>
                </datalist>
                @error('category') <div class="admin-error">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label"><span class="text-comment">./ </span>content</label>
                <textarea class="form-control" id="content" name="content" rows="12" required>{{ old('content', $post->content) }}</textarea>
                <div class="admin-hint mt-1">Plain text — line breaks become paragraphs. Leave the slug alone: it's generated automatically from the title.</div>
                @error('content') <div class="admin-error">{{ $message }}</div> @enderror
            </div>

            <div class="admin-actions">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-quaternary">{{ $editing ? 'Save changes' : 'Create post' }}</button>
            </div>
        </form>
    </div>
</x-admin-layout>