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

            @if (is_null($signedUrl))
                <div class="text-center mt-6">
                    <p class="text-xl font-semibold text-red-600">
                        Your created secret is only available to be seen once before sharing.
                    </p>
                </div>
            @else
                <h1 class="text-3xl font-bold text-center text-gray-800">Your Created Secret</h1>

                <div class="text-center mt-4 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-700">Your Signed URL</h2>

                    <div class="text-center mt-2">
                        <p class="text-sm font-semibold text-yellow-600">
                            Please make sure to save the URL, as you will only be able to view it once.
                        </p>
                    </div>

                    <div class="relative bg-gray-100 p-4 rounded-lg shadow-md">
                        <p onclick="copyToClipboard()" id="signedUrl" class="text-blue-500 break-words cursor-pointer">
                            {{ $signedUrl }}
                        </p>
                        <button onclick="copyToClipboard()"
                                class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">
                            <x-heroicon-o-clipboard-document class="w-5 h-5"/>
                        </button>

                    </div>
                </div>

                <div class="flex justify-center mt-6 space-x-6">
                    <div class="flex-1 bg-gray-700 text-white p-4 rounded-lg shadow-lg text-center">
                        <h2 class="text-lg font-semibold">Usage Amount</h2>
                        <p class="mt-1">{{ $usageAmount ?? "Not set" }}</p>
                    </div>
                    <div class="flex-1 bg-gray-700 text-white p-4 rounded-lg shadow-lg text-center">
                        <h2 class="text-lg font-semibold">Expires At</h2>
                        <p class="mt-1">
                            @if($expiresAt)
                                <span id="expires-at" data-utc="{{ Carbon::parse($expiresAt)->toIso8601String() }}"></span>
                        @else
                            <p>Not Set</p>
                        @endif

                    </div>
                </div>
            @endif
        </div>
    </section>

    <script>
        function copyToClipboard() {
            const url = document.getElementById('signedUrl').innerText;
            navigator.clipboard.writeText(url).then(() => {
                alert('URL copied to clipboard!');
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            const expiresAtElement = document.getElementById('expires-at');
            console.log("EXPIRES AT", expiresAtElement)
            if (expiresAtElement) {
                const utcDate = expiresAtElement.getAttribute('data-utc');
                console.log("UTC DATE", utcDate);
                const localDate = new Date(utcDate);
                console.log("Converted Date:", localDate);

                expiresAtElement.textContent = localDate.toLocaleString('nl-NL', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false,
                });
            }
        });
    </script>
@endsection
