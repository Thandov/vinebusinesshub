    <div class="flex flex-col items-center">
        <div class="w-96">
            <div class="step" id="step1">
                <!-- Step 1 content -->
                <h2>Step 1</h2>
                <input type="text" placeholder="Enter your name">
                <button class="btn-next">Next</button>
            </div>

            <div class="step hidden" id="step2">
                <!-- Step 2 content -->
                <h2>Step 2</h2>
                <input type="email" placeholder="Enter your email">
                <button class="btn-prev">Previous</button>
                <button class="btn-next">Next</button>
            </div>

            <div class="step hidden" id="step3">
                <!-- Step 3 content -->
                <h2>Step 3</h2>
                <textarea placeholder="Enter your message"></textarea>
                <button class="btn-prev">Previous</button>
                <button class="btn-next">Next</button>
            </div>

            <div class="step hidden" id="step4">
                <!-- Step 4 content -->
                <h2>Step 4</h2>
                <p>Thank you for submitting the form!</p>
                <button class="btn-prev">Previous</button>
                <button class="btn-submit">Submit</button>
            </div>
        </div>

        <div class="mt-4">
            <button class="btn-nav" data-target="#step1">1</button>
            <button class="btn-nav" data-target="#step2">2</button>
            <button class="btn-nav" data-target="#step3">3</button>
            <button class="btn-nav" data-target="#step4">4</button>
        </div>
    </div>