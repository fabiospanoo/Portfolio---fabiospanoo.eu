<x-layout title="404 // Page not found">
    <div class="body-style">
        <header class="header-custom" style="min-height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p class="contact-prompt"><span class="text-comment">$</span> error: command not found</p>
            <h1 class="title bolder">404 // Page not found</h1>
            <p class="contact-prompt">The page you're looking for doesn't exist... yet.</p>
            <a class="btn btn-quaternary mt-3" href="{{ route('projects') }}">cd ~/home</a>
        </header>
    </div>
</x-layout>