<x-admin-layout title="login // admin">
    <div class="admin-card admin-auth">
        <p class="admin-eyebrow">./ restricted area</p>
        <h2 class="admin-title">Sign in</h2>

        <form action="{{ route('admin.login.submit') }}" method="POST" class="admin-form mt-4">
            @csrf

            <div class="mb-4">
                <label for="password" class="form-label"><span class="text-comment">./ </span>password</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" autofocus required>
                @error('password') <div class="admin-error">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-quaternary w-100">Authenticate</button>
        </form>
    </div>
</x-admin-layout>
