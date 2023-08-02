<x-app-layout title="Staff Dashboard">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-4">
            <div class="p-6 bg-white border-b border-gray-200">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{route('bdashboard', $id)}}" class="ml-1 text-sm font-medium inline-flex">
                                <svg class="mr-2 w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Dashboard</a>
                        </li>
                        <!--                         <a href="/admin/staff/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Staff
                        </a> -->
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Website Power Up</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="md:grid md:grid-cols-7 gap-4">
            <div class="md:col-span-2">
                <div class="p-6 bg-white border-b border-gray-200 bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    toggle powerup
                </div>
            </div>
            <div class="md:col-span-5 mb-4">
                <div class="flex items-start justify-center">
                    <div class="w-full bg-white p-8 shadow-sm sm:rounded-lg overflow-hidden">
                        <form action="{{ route('submit') }}" method="POST" class="flex flex-col" id="multi-step-form">
                            @csrf

                            <!-- Step 1 -->
                            <div class="mb-6 step" data-step="1">
                                <label for="step1" class="block text-gray-700 font-semibold mb-2">Step 1</label>
                                <input type="text" name="step1" id="step1" class="w-full p-2 border border-gray-300 rounded-md">

                            </div>

                            <!-- Step 2 -->
                            <div class="mb-6 step hidden" data-step="2">
                                <label for="step2" class="block text-gray-700 font-semibold mb-2">Step 2</label>
                                <input type="text" name="step2" id="step2" class="w-full p-2 border border-gray-300 rounded-md">

                            </div>

                            <!-- Step 3 -->
                            <div class="mb-6 step hidden" data-step="3">
                                <label for="step3" class="block text-gray-700 font-semibold mb-2">Step 3</label>
                                <input type="text" name="step3" id="step3" class="w-full p-2 border border-gray-300 rounded-md">
                            </div>

                            <!-- Step 4 -->
                            <div class="mb-6 step hidden" data-step="4">
                                <label for="step4" class="block text-gray-700 font-semibold mb-2">Step 4</label>
                                <input type="text" name="step4" id="step4" class="w-full p-2 border border-gray-300 rounded-md">
                            </div>
                            <div class="flex justify-between mt-4">
                                <button type="button" onclick="prevStep()" class="prev-button px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600" style="display: none;">Previous</button>
                                <button type="button" onclick="nextStep()" class="next-button ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Next</button>
                                <button type="submit" class="submit-button ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600" style="display: none;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const form = document.getElementById('multi-step-form');
                        const steps = form.querySelectorAll('.step');
                        let currentStep = 1;

                        function showStep(step) {
                            steps.forEach((stepElement) => {
                                stepElement.style.display = 'none';
                            });
                            steps[step - 1].style.display = 'block';
                        }

                        window.nextStep = function() {
                            if (currentStep < steps.length) {
                                showStep(currentStep + 1);
                                currentStep++;
                            }
                            updateButtonVisibility();
                        }

                        window.prevStep = function() {
                            if (currentStep > 1) {
                                showStep(currentStep - 1);
                                currentStep--;
                            }
                            updateButtonVisibility();
                        }

                        function updateButtonVisibility() {
                            const prevButton = form.querySelector('.prev-button');
                            const nextButton = form.querySelector('.next-button');
                            const submitButton = form.querySelector('.submit-button');

                            if (currentStep === 1) {
                                prevButton.style.display = 'none';
                            } else {
                                prevButton.style.display = 'block';
                            }

                            if (currentStep === steps.length) {
                                nextButton.style.display = 'none';
                                submitButton.style.display = 'block';
                            } else {
                                nextButton.style.display = 'block';
                                submitButton.style.display = 'none';
                            }
                        }

                        // Initial setup
                        showStep(currentStep);
                        updateButtonVisibility();
                    });
                </script>

            </div>
        </div>
        <x-powerupslist />
    </div>
</x-app-layout>