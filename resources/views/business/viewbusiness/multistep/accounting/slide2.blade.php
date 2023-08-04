<!-- taxpayer.blade.php -->
<div class="bg-white shadow rounded-lg p-6">
    <h1 class="text-3xl font-bold mb-6">Taxpayer and Filing Information</h1>

    <div class="mb-4">
        <label class="block text-gray-700 font-semibold mb-2">Taxpayer Status</label>
        <div class="flex space-x-4">
            <label>
                <input type="radio" name="taxpayer_status" value="individual" class="mr-2">
                Individual
            </label>
            <label>
                <input type="radio" name="taxpayer_status" value="business" class="mr-2">
                Business
            </label>
        </div>
    </div>

    <div class="mb-4">
        <label for="business_name" class="block text-gray-700 font-semibold mb-2">Business Name and Registration Number (if applicable)</label>
        <input type="text" id="business_name" name="business_name" class="border border-gray-300 p-2 rounded-md w-full">
    </div>

    <div class="mb-4">
        <label for="identity_number" class="block text-gray-700 font-semibold mb-2">South African Identity Number (for individuals)</label>
        <input type="text" id="identity_number" name="identity_number" class="border border-gray-300 p-2 rounded-md w-full">
    </div>

    <div class="mb-4">
        <label for="tax_reference_number" class="block text-gray-700 font-semibold mb-2">South African Revenue Service (SARS) Tax Reference Number</label>
        <input type="text" id="tax_reference_number" name="tax_reference_number" class="border border-gray-300 p-2 rounded-md w-full">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-semibold mb-2">Tax Filing History (previous tax year filing status)</label>
        <div class="flex space-x-4">
            <label>
                <input type="radio" name="tax_filing_history" value="filed" class="mr-2">
                Filed
            </label>
            <label>
                <input type="radio" name="tax_filing_history" value="notFiled" class="mr-2">
                Not Filed
            </label>
        </div>
    </div>
</div>