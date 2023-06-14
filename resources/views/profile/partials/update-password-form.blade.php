<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.update') }}">
        @method('PUT')
        @csrf

        <!-- Add form fields for updating the password -->
        <!-- For example: current_password, new_password, confirm_password -->

        <button type="submit">
            {{ __('Update Password') }}
        </button>
    </form>


</section>
