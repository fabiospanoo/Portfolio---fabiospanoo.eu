<x-layout
    :title="$post->title.' // Fabio Spanò'"
    :meta-description="\Illuminate\Support\Str::limit($post->excerpt ?: $post->content, 160)"
    metaType="article">
    <div class="body-style">
        <main class="blog-article">
            <a class="blog-back-link" href="{{ route('blog.index') }}">&larr; Back to blog</a>

            <article>
                <header class="blog-article-header">
                    <p class="blog-date"><span class="text-comment">./</span> {{ $post->created_at->format('d F Y') }}</p>
                    <h1 class="bolder">{{ $post->title }}</h1>
                </header>

                <div class="blog-article-content contact-prompt" style="margin-top: 48px;">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </article>
        </main>
    </div>
</x-layout>