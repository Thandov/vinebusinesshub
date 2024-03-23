<div class="tab-pane fade show active" id="pills-location" role="tabpanel" aria-labelledby="pills-location-tab">
    <form action="{{ route('business.updateClientLocation') }}" method="post">
        @csrf
        <input type="hidden" name="bid" value="{{ $business->id }}">
        @include('business.viewbusiness.location')

        <button type="submit">Save</button>
    </form>
</div>