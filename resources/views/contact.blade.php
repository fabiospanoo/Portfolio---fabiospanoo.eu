<x-layout title="Contact // Fabio Spanò">
    <div class="body-style">
        <header>
            <div class="contact-terminal">
                <h2 class="title bolder text-center mt-5 pt-5" data-aos="fade-up">Let's talk</h2>
                <p class="contact-prompt" data-aos="fade-up" data-aos-delay="150">Interested in my computational knowledge of AI agents and Java? Send me a message, I usually reply within a day.</p>
                <p class="contact-links" data-aos="fade-up" data-aos-delay="300">
                    <span class="text-keyword">email</span> = <a class="text-link-custom copy-email" href="copy:fabiospanoo@outlook.it" title="Click to copy">'fabiospanoo [at] outlook (dot) it' ;</a>
                    <span class="text-comment mx-2">|</span>
                    <span class="text-keyword">github</span> = <a class="text-link-custom" href="https://github.com/fabiospanoo" target="_blank">'fabiospanoo' ;</a>
                </p>

                @if (session('success'))
                    <div class="alert alert-success py-2 px-3" role="alert">{{ session('success') }}</div>
                @endif

                @php($formId = config('services.formspree.id'))

                @if ($formId)
                    <div id="contact-success" class="alert py-3 px-3 d-none" role="alert" style="background-color:#161617;border:1px solid #343434;color:#6A9955;font-family:'Space Mono',monospace;">
                        <span class="text-keyword">&gt;</span> message delivered! I'll get back to you soon.
                    </div>
                    <div id="contact-error" class="alert py-3 px-3 d-none" role="alert" style="background-color:#161617;border:1px solid #343434;color:#F14C4C;font-family:'Space Mono',monospace;">
                        <span class="text-keyword">&gt;</span> something went wrong. try again, or email me directly at fabiospanoo@outlook.it
                    </div>
                @endif

                <form id="contact-form" class="contact-form" data-aos="fade-up" data-aos-delay="450" method="POST"
                    action="{{ $formId ? 'https://formspree.io/f/' . $formId : route('contact.send') }}"
                    @if ($formId) accept-charset="UTF-8" enctype="multipart/form-data" @endif>
                    @if (!$formId)
                        @csrf
                    @else
                        <input type="hidden" name="_subject" value="New message from your website">
                    @endif

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label"><span class="text-comment">./ </span>name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="email" class="form-label"><span class="text-comment">./ </span>email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="message" class="form-label"><span class="text-comment">./ </span>message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                        @error('message') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="subtitle small me-2">* All fields are required</span>
                        <button type="submit" class="btn btn-quaternary">Send message</button>
                    </div>
                </form>

                @if ($formId)
                    <script>
                        document.addEventListener('submit', function (e) {
                            if (e.target.id !== 'contact-form') return;
                            e.preventDefault();
                            const form = e.target;
                            const button = form.querySelector('button[type="submit"]');
                            button.disabled = true;
                            fetch(form.action, {
                                    method: form.method,
                                    headers: { 'Accept': 'application/json' },
                                    body: new FormData(form)
                                })
                                .then(r => {
                                    if (!r.ok) throw new Error(r.status);
                                    form.classList.add('d-none');
                                    document.getElementById('contact-success').classList.remove('d-none');
                                })
                                .catch(() => {
                                    document.getElementById('contact-error').classList.remove('d-none');
                                })
                                .finally(() => { button.disabled = false; });
                        });
                    </script>
                @endif
            </div>
        </header>
    </div>
</x-layout>