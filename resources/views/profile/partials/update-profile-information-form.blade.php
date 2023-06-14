<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
    <form method="POST" action="{{ route('profile.update') }}">
        @method('PUT')
        @csrf

        <!-- Add form fields for updating profile information -->
        <!-- For example: name, email, etc. -->

        <button type="submit">
            {{ __('Update Profile') }}
        </button>
    </form>


</section>
