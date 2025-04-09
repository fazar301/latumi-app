<?php

namespace App\Filament\Pages;


use Filament\Facades\Filament;
use Filament\Pages\Auth\Login as BasePage;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Validation\ValidationException;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;

class Login extends BasePage
{
    public function authenticate(): ?LoginResponse
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            $this->getRateLimitedNotification($exception)?->send();
 
            return null;
        }
 
        $data = $this->form->getState();
 
        if (! Filament::auth()->attempt($this->getCredentialsFromFormData($data), $data['remember'] ?? false)) {
            throw ValidationException::withMessages([
                'data.email' => 'Email atau password yang anda masukkan salah',
            ]);
        }
 
        $user = Filament::auth()->user();
 
        if (($user instanceof FilamentUser) && (! $user->canAccessPanel(Filament::getCurrentPanel()))) {
            Filament::auth()->logout();
 
            throw ValidationException::withMessages([
                'data.email' => 'Email atau password yang anda masukkan salah',
            ]);
        } 

        if($user->role != 'admin'){
            Filament::auth()->logout();
            throw ValidationException::withMessages([
                'data.email' => 'Akses ditolak',
            ]);
        }
        // elseif ( $user->status === 'suspended' ) {
        //     Filament::auth()->logout();
 
        //     throw ValidationException::withMessages([
        //         'data.email' => 'Your account is suspended.',
        //     ]);
        // } 
 
        session()->regenerate();
 
        return app(LoginResponse::class);
    }
}
