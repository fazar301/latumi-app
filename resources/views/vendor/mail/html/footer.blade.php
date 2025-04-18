<tr>
    <td>
        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td class="content-cell" align="center">
                    {{ Illuminate\Mail\Markdown::parse($slot) }}
                    <p style="margin-top: 10px; font-size: 12px; color: #9ca3af;">
                        Jl. Bayi Sehat No. 123, Jakarta Selatan, Indonesia<br>
                        +62 812-3456-7890 | info@babyspa-blade.com
                    </p>
                    <p style="margin-top: 10px;">
                        <a href="{{ config('app.url') }}/instagram" style="text-decoration: none; margin: 0 5px;">
                            <img src="{{ asset('images/instagram-icon.png') }}" alt="Instagram" width="24" height="24">
                        </a>
                        <a href="{{ config('app.url') }}/facebook" style="text-decoration: none; margin: 0 5px;">
                            <img src="{{ asset('images/facebook-icon.png') }}" alt="Facebook" width="24" height="24">
                        </a>
                        <a href="{{ config('app.url') }}/whatsapp" style="text-decoration: none; margin: 0 5px;">
                            <img src="{{ asset('images/whatsapp-icon.png') }}" alt="WhatsApp" width="24" height="24">
                        </a>
                    </p>
                </td>
            </tr>
        </table>
    </td>
</tr>
