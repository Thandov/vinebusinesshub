<p>Dear Business,</p>

<p>Your requested industry has been {{ $status }}.</p>

@if ($status === 'approved')
    <p>The approved industry is: {{ $industry->industry }}</p>
@endif

<p>Thank you for your request.</p>

<p>Best regards,</p>
<p>The VineSA</p>
