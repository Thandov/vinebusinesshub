<section class="bg-white p-6 shadow-md rounded-md">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('PUT')

        <!-- Add form fields for updating the password -->
        <div class="mb-4">
            <label for="new_password" class="block text-gray-700">{{ __('New Password') }}</label>
            <input id="new_password" type="password" name="new_password"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                autocomplete="new-password">
        </div>

        <div class="mb-4">
            <label for="new_password_confirmation" class="block text-gray-700">{{ __('Confirm New Password') }}</label>
            <input id="new_password_confirmation" type="password" name="new_password_confirmation"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                autocomplete="new-password">
        </div>

        <button type="submit"
            class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">
            {{ __('Update Password') }}
        </button>

        <!-- Display success message if available -->
        @if (session('success'))
            <p class="text-sm text-gray-600 mt-2">{{ session('success') }}</p>
        @endif
    </form>
</section>
