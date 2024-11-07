@extends('layouts.app')

@section('content')
    <section>
        <div class="flex flex-col justify-center w-full">
            <h1 class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 text-center">Worry-Free
                Secret Sharing.</h1>
            <p class="mt-3 text-lg/6 text-gray-600 text-center">
                Enter a secret below and click 'Generate Link' to share it securely. You can also configure the link's
                duration and usage limits.
            </p>
            <div class="mt-5 p-5 border border-gray-900 rounded-2xl">
                <x-share-secret-form/>
            </div>
        </div>
    </section>
@endsection
