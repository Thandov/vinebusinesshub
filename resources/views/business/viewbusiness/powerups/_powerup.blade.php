<x-app-layout title="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-4">
            <div class="p-6 bg-white border-b border-gray-200">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('bdashboard') }}" class="ml-1 text-sm font-medium inline-flex">
                                <svg class="mr-2 w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                {{ $urlSegments[0] == 'bdashboard' ? 'Dashboard' : ucfirst($urlSegments[0]) }}
                            </a>
                        </li>
                        @php
                        $url = '/';
                        @endphp
                        @foreach($urlSegments as $index => $segment)
                        @php
                        $url .= $segment . '/';
                        @endphp
                        @if($segment != 'bdashboard')
                        <li @if($loop->last) aria-current="page" @endif>
                            <a href="{{ $url }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                <svg class="mr-2 w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                {{ ucfirst($segment) }}
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ol>
                </nav>

            </div>
        </div>
        <div class="md:grid md:grid-cols-7 gap-4">
            <div class="md:col-span-2">
                <div class="p-6 bg-white border-b border-gray-200 bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    @if(session('message'))
                    @php
                    $messageType = session('message.type');
                    $backgroundColor = $messageType === 'success' ? 'green' : ($messageType === 'error' ? 'red' : 'yellow');
                    $borderColor = $messageType === 'success' ? 'green' : ($messageType === 'error' ? 'red' : 'yellow');
                    $textColor = $messageType === 'success' ? 'green' : ($messageType === 'error' ? 'red' : 'yellow');
                    @endphp
                    <div class="bg-{{ $backgroundColor }}-100 border-l-4 border-{{ $borderColor }}-500 text-{{ $textColor }}-700 p-4 mb-4" role="alert">
                        <p>{{ session('message.text') }}</p>
                    </div>
                    @endif
                    @if($actstatus)
                    @php
                    $linking = "/bdashboard/accounting/deactivatepowerup";
                    $btnstat = "Deactivate";
                    $col = "red";
                    @endphp
                    @else
                    @php $linking = "/bdashboard/accounting/activatepowerup";
                    $btnstat = "Activate";
                    $col = "blue";
                    @endphp
                    @endif
                    <form action="{{$linking}}" method="post">
                        @csrf
                        <input type="hidden" name="powerid" value="{{$powerid->powerid}}">
                        <x-btn btnType="submit" name="{{$btnstat}}" linking="" unqid="" klass="" color="{{$col}}" />
                    </form>
                </div>
            </div>
            <div class="md:col-span-5 mb-4">
                @php
                $directoryPath = resource_path("views/business/viewbusiness/multistep/{$powerup}");
                $bladeFiles = \Illuminate\Support\Facades\File::files($directoryPath);
                $slides = collect($bladeFiles)->map(function ($file) use ($powerup) {
                $filename = str_replace('.blade', "",pathinfo($file->getFilename(), PATHINFO_FILENAME));
                return "business.viewbusiness.multistep.{$powerup}.{$filename}";
                });
                @endphp

                <x-multistep-form :slides="$slides" linking="{{ route('bdashboard.accounting.activatepowerup', ['id' => 1]) }}" />

            </div>
        </div>
        <x-powerupslist />
    </div>
</x-app-layout>