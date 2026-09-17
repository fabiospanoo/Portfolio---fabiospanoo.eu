<x-layout title="500 // Server error">
    <div class="body-style">
        <header class="header-custom" style="min-height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p class="contact-prompt"><span class="text-comment">$</span> error: process crashed with a core dump</p>
            <h1 class="title bolder">500 // Server error</h1>
            <p class="contact-prompt">Something went wrong on my side. Try again in a moment.</p>
            <a class="btn btn-quaternary mt-3" href="{{ route('projects') }}">cd ~/home</a>
        </header>
    </div>
</x-layout>