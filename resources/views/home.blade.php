@extends('layouts.app')

@section('content')
    <section>
        <div class="bg-white">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <x-hero-section/>
            </div>
        </div>
    </section>

    <hr class="my-10"/>

    <section id="learnMore">
        <div class="bg-white">
            <div class="mx-auto max-w-7xl px-6 lg:px-8 space-y-5">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base/7 font-semibold text-gray-900">Share safe</h2>
                    <p class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl lg:text-balance">
                        Seamlessly Share Your Sensitive Data
                    </p>
                    <p class="mt-6 text-lg/8 text-gray-600">
                        With our advanced tool, share passwords securely without third-party interference.
                    </p>
                </div>
                <x-features-section :features="[
                    ['icon' => 'heroicon-o-clock', 'title' => 'Set Expiration for Links', 'description' => 'Allow users to set an expiration time for their link when created, ensuring it does not remain accessible indefinitely. This enhances security and control over shared information.'],
                    ['icon' => 'heroicon-o-eye', 'title' => 'Limit Usage of Links', 'description' =>  'Enable users to specify the maximum number of times a link can be used, allowing for controlled and secure sharing among a limited group of people.'],
                    ['icon' => 'heroicon-o-link', 'title' => 'Signed URLs', 'description' =>  'Allow users to create secure, time-limited links to their sensitive information, ensuring that shared passwords are protected with Laravel\'s robust encryption, and can be easily managed for expiration and access control.'],
                    ['icon' => 'heroicon-o-lock-closed', 'title' => 'Laravel Encryption', 'description' => 'Utilize Laravel\'s powerful encryption features to securely encrypt and decrypt sensitive data with ease, ensuring that user information remains confidential and protected against unauthorized access.']
                ]"/>
            </div>
        </div>
    </section>
@endsection
