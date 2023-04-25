@foreach($business as $busi)
<x-business-card id="{{$busi->business_name}}" name="{{$busi->business_name}}" logo="{{ isset($busi->logo) ? $busi->logo : '' }}" 
    industry="{{$busi->industry}}" />
@endforeach