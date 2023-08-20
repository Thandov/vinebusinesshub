<div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2">Tax Compliance History:</label>
    <div class="flex">
        <label class="mr-4">
            <input type="checkbox" name="tax_compliance_history[]" value="previous_audits" class="form-checkbox">
            <span class="ml-2">Previous Audits</span>
        </label>
        <label class="mr-4">
            <input type="checkbox" name="tax_compliance_history[]" value="penalties" class="form-checkbox">
            <span class="ml-2">Penalties</span>
        </label>
        <label>
            <input type="checkbox" name="tax_compliance_history[]" value="other_issues" class="form-checkbox">
            <span class="ml-2">Other Tax Issues</span>
        </label>
    </div>
</div>
<div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2" for="specific_services">Specific Tax Services Required:</label>
    <textarea id="specific_services" class="form-textarea w-full" rows="4" placeholder="Specify the tax services you need"></textarea>
</div>