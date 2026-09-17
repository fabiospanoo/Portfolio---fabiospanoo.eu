<x-admin-layout title="2fa setup // admin">
    <div class="admin-card admin-auth">
        <p class="admin-eyebrow">./ two-factor setup</p>
        <h2 class="admin-title">Connect your authenticator</h2>
        <p class="admin-hint mt-2">
            Scan the QR code with your authenticator app (Microsoft Authenticator, Google Authenticator, ...).
            Then enter the 6-digit code it shows to confirm.
        </p>

        <div class="admin-qr">
            <div class="admin-qr-frame">{!! $qrSvg !!}</div>
            <div class="admin-qr-side">
                <p class="admin-hint mb-2">Can't scan? Enter this key manually:</p>
                <code class="admin-secret">{{ $secret }}</code>
            </div>
        </div>

        <form action="{{ route('admin.setup.confirm') }}" method="POST" class="admin-form mt-4">
            @csrf

            <div class="mb-4">
                <label for="code" class="form-label"><span class="text-comment">./ </span>enter the 6-digit code</label>
                <input type="text" class="form-control admin-code-input" id="code" name="code"
                    inputmode="numeric" autocomplete="one-time-code" maxlength="6" pattern="[0-9 ]*"
                    placeholder="000000" autofocus required>
                @error('code') <div class="admin-error">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-quaternary w-100">Enable 2FA &amp; sign in</button>
        </form>
    </div>
</x-admin-layout>
