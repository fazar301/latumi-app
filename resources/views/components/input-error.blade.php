@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            @if($message == 'auth.failed')
                <li>Email atau password yang anda masukkan salah</li>
            @elseif ($message == 'validation.email')
                <li>Masukkan email yang valid!</li>
            @elseif($message == 'validation.confirmed')
                <li>Password tidak sama!</li>
            @elseif($message == 'validation.min.string')
                <li>Minimal password 8 karakter!</li>
            @elseif($message == 'passwords.reset')
                <li>Password berhasil diubah</li>
            @elseif($message = 'passwords.user')
                <li>Email tidak ditemukan!</li>
            @else
                <li>{{ $message }}</li>
            @endif
        @endforeach
    </ul>
@endif
