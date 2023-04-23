@foreach($business as $busi)
<x-business-card id="{{$busi->business_name}}" name="{{$busi->business_name}}" logo="{{$busi->logo}}" />
@endforeach