<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <form id="delete-account-form" method="POST" action="{{ route('profile.destroy') }}">
        @method('DELETE')
        @csrf

        <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md shadow-sm"
            onclick="showConfirmationDialog()">
            {{ __('Delete Account') }}
        </button>
    </form>

    <div id="confirmation-dialog" class="hidden">
        <p>Are you sure you want to delete your account? This action cannot be undone.</p>
        <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md shadow-sm"
            onclick="deleteAccount()">Confirm</button>
        <button type="button"
            class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-md shadow-sm"
            onclick="cancelDeletion()">Cancel</button>
    </div>

    <script>
        function showConfirmationDialog() {
            document.getElementById('confirmation-dialog').classList.remove('hidden');
        }

        function deleteAccount() {
            document.getElementById('delete-account-form').submit();
        }

        function cancelDeletion() {
            document.getElementById('confirmation-dialog').classList.add('hidden');
        }
    </script>
</section>
