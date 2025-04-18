@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ asset('images/baby-spa-logo.png') }}" class="logo" alt="Baby Spa Logo">
            @else
                <img src="{{ asset('images/baby-spa-logo.png') }}" class="logo" alt="{{ $slot }}">
                <div style="margin-top: 10px; font-size: 18px; color: #ec4899; font-weight: bold;">{{ $slot }}</div>
            @endif
        </a>
    </td>
</tr>
