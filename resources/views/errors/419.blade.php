<x-layout title="419 // Session expired">
    <div class="body-style">
        <header class="header-custom" style="min-height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p class="contact-prompt"><span class="text-comment">$</span> error: session timed out</p>
            <h1 class="title bolder">419 // Session expired</h1>
            <p class="contact-prompt">Your session ended. Hit refresh and try again.</p>
            <a class="btn btn-quaternary mt-3" href="{{ url()->previous() ?: route('projects') }}">try again</a>
        </header>
    </div>
</x-layout>