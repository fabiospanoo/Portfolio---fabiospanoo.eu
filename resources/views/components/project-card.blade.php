@php($button = $buttonClass())

<div class="col-4" data-aos="fade-up" data-aos-delay="{{ 600 + $index * 100 }}">
    <div class="card card-proj text-bg-dark" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title bold" style="padding-bottom: 8px;">{{ $project->title }}</h5>
            <img src="{{ $project->image ?: 'https://picsum.photos/1600/900' }}" class="card-img-top" alt="..." style="border-radius: 0px; padding: 1rem; padding-bottom: 1rem; padding-left: 0px; padding-right: 0px; border-top: 1px solid #343434; border-bottom: 1px solid #343434;">
            <p class="card-text pt-2 project-card-text">{{ $project->text }}</p>
            @if ($project->tags)
                <div class="project-tags">
                    @foreach ($project->tags as $tag)
                        <span class="project-tag {{ $tagClass($tag) }}">{{ $tag }}</span>
                    @endforeach
                </div>
            @endif
            @if ($project->url)
                <a href="{{ $project->url }}" target="_blank" rel="noopener" class="btn btn-{{ $button }}">Github</a>
            @endif
        </div>
    </div>
</div>