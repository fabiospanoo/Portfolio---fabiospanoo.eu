<x-layout title="403 // Forbidden">
    <div class="body-style">
        <header class="header-custom" style="min-height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p class="contact-prompt"><span class="text-comment">$</span> error: permission denied</p>
            <h1 class="title bolder">403 // Forbidden</h1>
            <p class="contact-prompt">You don't have permission to access this resource.</p>
            <a class="btn btn-quaternary mt-3" href="{{ route('projects') }}">cd ~/home</a>
        </header>
    </div>
</x-layout>