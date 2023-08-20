<!-- $btnType, $name, $linking, $unqid, $klass, $color -->
@if ($btnType === 'submit')
<input type="submit" value="{{$name}}" class="inline-flex items-center px-4 py-2 bg-@php echo $color; @endphp-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-@php echo $color; @endphp-700 active:bg-@php echo $color; @endphp-900 focus:outline-none focus:border-@php echo $color; @endphp-900 focus:ring ring-@php echo $color; @endphp-300 disabled:opacity-25 transition ease-in-out duration-150">
@else

@endif