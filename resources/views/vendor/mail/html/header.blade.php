<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://www.cargill.com/image/1432080092113/cargill-color-logo.jpg" class="logo"
                    alt="Cargill Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
