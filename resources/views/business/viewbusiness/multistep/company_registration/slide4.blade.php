<!-- company.blade.php -->
<div class="bg-white shadow rounded-lg p-6">
    <h1 class="text-3xl font-bold mb-6"> Documentation and Compliance:</h1>

    <div class="mb-4">
        <label for="full_name" class="block text-gray-700 font-semibold mb-2"> Have you registered for the appropriate taxes, such as VAT</label>
        <input type="text" id="company_type" name="company_type" class="border border-gray-300 p-2 rounded-md w-full">
    </div>

    <div class="mb-4">
        <label for="contact_number" class="block text-gray-700 font-semibold mb-2">Have you ensured that your company's operations and structure comply with CIPC's regulations?</label>
        <input type="text" id="company_name" name="company_name" class="border border-gray-300 p-2 rounded-md w-full">
    </div>

    <div class="mb-4">
        <label for="contact_number" class="block text-gray-700 font-semibold mb-2">Have you prepared the required documentation?</label>
        <input type="text" id="company_name" name="company_name" class="border border-gray-300 p-2 rounded-md w-full">
    </div>

    <div class="mb-4">
        <label for="email_address" class="block text-gray-700 font-semibold mb-2">if yes please upload them</iframe> </label>
        <input type="file" name="documents[]" id="documents" multiple>
    </div>

</div>