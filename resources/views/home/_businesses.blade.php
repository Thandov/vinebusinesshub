@foreach ($business as $busi)
    <x-business-card id="{{ $busi->id }}" name="{{ $busi->business_name }}" industry="{{ $busi->industry }}"
        logo="{{ $busi->logo }}" />
@endforeach
