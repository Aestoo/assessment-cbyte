@extends('layouts.app')

@section('content')
    <section>
        <div class="flex flex-col justify-center w-full">
            <h1 class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 text-center">Worry-Free
                Password Sharing.</h1>
            <p class="mt-3 text-lg/6 text-gray-600 text-center">
                Enter a password below and click 'Generate Link' to share it securely. You can also configure the link's
                duration and usage limits.
            </p>
            <div class="mt-5 p-5 border border-gray-900 rounded-2xl">
                <x-share-password-form/>
            </div>

        </div>
    </section>

    <script>
        function toggleTimeLimitFields() {
            const checkbox = document.getElementById('limitedTime');
            const timeLimitFields = document.getElementById('timeLimitFields');
            timeLimitFields.classList.toggle('hidden', !checkbox.checked);
        }
    </script>
@endsection
