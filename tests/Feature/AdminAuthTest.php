<?php

use App\Models\AdminCredential;
use App\Services\TotpService;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Support\Facades\Config;
use PragmaRX\Google2FA\Google2FA;

beforeEach(function () {
    $this->withoutMiddleware(ValidateCsrfToken::class);
});

it('blocks the admin area without an authenticated session', function () {
    $this->get('/admin/projects')->assertRedirect(route('admin.login'));
});

it('rejects an invalid admin password', function () {
    Config::set('admin.password', 'secret123');

    $this->post('/login', ['password' => 'wrong'])
        ->assertSessionHasErrors('password');
});

it('logs in with the correct password and starts 2FA setup when not configured', function () {
    Config::set('admin.password', 'secret123');

    $this->post('/login', ['password' => 'secret123'])
        ->assertRedirect(route('admin.setup'));
});

it('redirects to the 2FA step when TOTP is already configured', function () {
    $secret = app(TotpService::class)->generateSecret();
    AdminCredential::create([
        'totp_secret' => $secret,
        'totp_confirmed_at' => now(),
    ]);
    Config::set('admin.password', 'secret123');

    $this->post('/login', ['password' => 'secret123'])
        ->assertRedirect(route('admin.2fa'));
});

it('completes the full login flow with a valid TOTP code', function () {
    $secret = app(TotpService::class)->generateSecret();
    AdminCredential::create([
        'totp_secret' => $secret,
        'totp_confirmed_at' => now(),
    ]);
    Config::set('admin.password', 'secret123');

    $code = (new Google2FA)->getCurrentOtp($secret);

    $this->post('/login', ['password' => 'secret123'])
        ->assertRedirect(route('admin.2fa'));

    $this->post('/login/2fa', ['code' => $code])
        ->assertRedirect(route('admin.projects.index'));

    $this->get('/admin/projects')->assertOk();
});

it('rejects an invalid TOTP code', function () {
    $secret = app(TotpService::class)->generateSecret();
    AdminCredential::create([
        'totp_secret' => $secret,
        'totp_confirmed_at' => now(),
    ]);
    Config::set('admin.password', 'secret123');

    $this->post('/login', ['password' => 'secret123']);
    $this->post('/login/2fa', ['code' => '000000'])
        ->assertSessionHasErrors('code');
});