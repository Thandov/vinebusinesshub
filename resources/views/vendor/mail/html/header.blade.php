<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="/img/logo.png" class="logo" alt="The Vine SA Logo">

@else
{{ $slot }}
@endif
</a>
</td>
</tr>
