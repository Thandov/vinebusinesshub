<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    @if ($errors->has('new_password'))
        <div class="alert alert-error">
            {{ $errors->first('new_password') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" class="mt-4">
        @method('PUT')
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700">{{ __('Name') }}</label>
            <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required autofocus>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required>
        </div>

        <div class="mb-4">
            <label for="new_password" class="block text-gray-700">{{ __('New Password') }}</label>
            <input id="new_password" type="password" name="new_password"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                autocomplete="new-password">

            @error('new_password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="new_password_confirmation" class="block text-gray-700">{{ __('Confirm New Password') }}</label>
            <input id="new_password_confirmation" type="password" name="new_password_confirmation"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                autocomplete="new-password">
        </div>

        <button type="submit"
            class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">
            {{ __('Update Profile') }}
        </button>
    </form>
</section>
