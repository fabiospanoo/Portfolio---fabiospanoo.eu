<x-layout title="Fabio Spanò // Agentic AI, Java, Web Developer" metaDescription="Portfolio of Fabio Spanò, web developer and agentic AI specialist. Projects built with Java, Laravel, Blade and more.">
    <div class="body-style">
        <header>
            <div class="header-custom">
                <h2 class="title bolder mt-5 pt-5" data-aos="fade-up">Web developer | Agentic AI | Java specialist</h2>
                <div class="container-introduction" style="margin-bottom: 24px;" data-aos="fade-up" data-aos-delay="150">
                    <p class="contact-prompt">I specialize in Java and Agentic AI while completing my web development master's at AuLab. My technical interests extend to Raspbian-based projects and building custom network environments.</p>
                    <p class="contact-prompt">Interested in my computational knowledge of AI agents and Java? Let's talk.</p>
                    <p class="contact-links" data-aos="fade-up" data-aos-delay="100">
                        <span class="text-keyword">email</span> = <a class="text-link-custom" href="copy:fabiospanoo@outlook.it">'fabiospanoo [at] outlook (dot) it' ;</a>
                        <span class="text-comment mx-2">|</span>
                        <span class="text-keyword">github</span> = <a class="text-link-custom" href="https://github.com/fabiospanoo" target="_blank">'fabiospanoo' ;</a>
                    </p>
                </div>
            </div>
            <section class="section-BlogCard" data-aos="fade-up" data-aos-delay="500">
                @if ($latestPost)
                    <div class="card card-proj text-bg-dark" style="width: 18rem;">
                        <div class="card-body blog-card-body">
                            <h6 class="card-subtitle subtitle mb-3 text-uppercase"><span class="text-comment">./</span> Latest from the blog</h6>
                            <h5 class="card-title bold mb-2">{{ \Illuminate\Support\Str::limit($latestPost->title, 45, '...') }}</h5>
                            <p class="card-text blog-card-preview">{{ \Illuminate\Support\Str::limit($latestPost->content, 65, '...') }}</p>
                            <a href="{{ route('blog.show', $latestPost) }}" class="card-link d-flex align-items-center gap-1">Read post <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                            </svg></a>
                        </div>
                    </div>
                @endif
                <div class="row g-3" style="padding-top: 16px;">
                    @foreach ($projects as $project)
                        <x-project-card :project="$project" :index="$loop->index" />
                    @endforeach
                </div>
            </section>
        </header>
    </div>
</x-layout>