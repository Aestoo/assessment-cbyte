@props(['features'])

<dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
    @foreach($features as $feature)
        <div class="relative pl-16">
            <dt class="text-base/7 font-semibold text-gray-900">
                <div class="absolute p-1 left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-gray-900">
                    @svg($feature['icon'], 'text-white')
                </div>
                {{ $feature['title'] }}
            </dt>
            <dd class="mt-2 text-base/7 text-gray-600">{{ $feature['description'] }}</dd>
        </div>
    @endforeach
</dl>
