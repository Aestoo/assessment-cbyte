@php use Carbon\Carbon; @endphp
@extends('layouts.app')

@section('content')
    <section class="max-w-lg mx-auto mt-10 p-8 bg-white rounded-lg shadow-lg">
        <div class="space-y-6">
            <a href="{{ route('secret.share.form') }}"
               class="flex items-center text-blue-600 font-semibold hover:underline">
                <x-heroicon-o-arrow-long-left class="w-5 h-5 mr-2"/>
                <span>Share New Secret</span>
            </a>

            <h1 class="text-3xl font-bold text-center text-gray-800">Your Secret</h1>

            <div class="text-center mt-4 space-y-4">
                <h2 class="text-lg font-semibold text-gray-700">Your Signed URL</h2>

                <div class="relative bg-gray-100 p-4 rounded-lg shadow-md">
                    <p onclick="copyToClipboard()" id="secretContext" class="break-words cursor-pointer">
                        {{ $secret->secret }}
                    </p>
                    <button onclick="copyToClipboard()"
                            class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">
                        <x-heroicon-o-clipboard-document class="w-5 h-5"/>
                    </button>

                </div>
            </div>

            <div class="flex justify-center mt-6 space-x-6">
                <div class="flex-1 bg-gray-700 text-white p-4 rounded-lg shadow-lg text-center">
                    <h2 class="text-lg font-semibold">Usage Amount Left</h2>
                    <p class="mt-1">{{ $secret->usageAmount ?? "No Limit" }}</p>
                </div>
                <div class="flex-1 bg-gray-700 text-white p-4 rounded-lg shadow-lg text-center">
                    <h2 class="text-lg font-semibold">Expires At</h2>
                    <p class="mt-1">
                        @if($secret->expiresAt)
                        {{ Carbon::parse($secret->expiresAt)->setTimezone('Europe/Amsterdam')->format('d-m-Y, H:i') }}
                    @else
                        <p>Never</p>
                    @endif

                </div>
            </div>
        </div>
        <div id="toast" style="display: none; position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            Secret copied to clipboard!
        </div>
    </section>

    <script>
        function copyToClipboard() {
            const context = document.getElementById('secretContext').innerText;
            if (context) {
                navigator.clipboard.writeText(context).then(() => {
                    const toast = document.getElementById('toast');
                    toast.style.display = 'block';

                    setTimeout(() => {
                        toast.style.display = 'none';
                    }, 3000);
                });
            }
        }
    </script>
@endsection
