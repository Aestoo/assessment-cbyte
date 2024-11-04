<form method="POST" action="{{route('password.share.store')}}">
    @csrf

    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input
            id="password"
            name="password"
            type="password"
            class="mt-1 block w-full p-2 border @error('password') border-red-600 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring focus:ring-gray-700"
            autocomplete="new-password"
            required
            value="{{ old('password') }}"
        />
        @error('password')
        <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input
            id="confirmPassword"
            name="confirmPassword"
            type="password"
            class="mt-1 block w-full p-2 border @error('confirmPassword') border-red-600 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring focus:ring-gray-700"
            autocomplete="new-password"
            required
            value="{{ old('confirmPassword') }}"
        />
        @error('confirmPassword')
        <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <label for="amountOfUsages" class="block text-sm font-medium text-gray-700">Amount of Usages</label>
        <input
            id="amountOfUsages"
            name="amountOfUsages"
            type="number"
            min="1"
            class="mt-1 block w-full p-2 border @error('amountOfUsages') border-red-600 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring focus:ring-gray-700"
            required
            value="{{ old('amountOfUsages') }}"
        />
        @error('amountOfUsages')
        <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <label for="limitedTime" class="flex items-center">
            <input
                id="limitedTime"
                name="limitedTime"
                type="checkbox"
                class="mr-2"
                onclick="toggleTimeLimitFields()"
                {{ old('limitedTime') ? 'checked' : '' }}
            />
            Set time limit
        </label>
    </div>

    <div id="timeLimitFields" class="hidden">
        <div class="mt-4">
            <label for="validForHours" class="block text-sm font-medium text-gray-700">Valid For (Hours)</label>
            <input
                id="validForHours"
                name="validForHours"
                type="number"
                min="0"
                class="mt-1 block w-full p-2 border @error('validForHours') border-red-600 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring focus:ring-gray-700"
                placeholder="Hours"
                value="{{ old('validForHours') }}"
            />
            @error('validForHours')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <p class="text-center">:</p>
        <div class="mt-4">
            <label for="validForMinutes" class="block text-sm font-medium text-gray-700">Valid For (Minutes)</label>
            <input
                id="validForMinutes"
                name="validForMinutes"
                type="number"
                min="0"
                max="59"
                class="mt-1 block w-full p-2 border @error('validForMinutes') border-red-600 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring focus:ring-gray-700"
                placeholder="Minutes"
                value="{{ old('validForMinutes') }}"
            />
            @error('validForMinutes')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mt-6">
        <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-500">
            Generate Link
        </button>
    </div>
</form>
<script>
    function toggleTimeLimitFields() {
        const checkbox = document.getElementById('limitedTime');
        const timeLimitFields = document.getElementById('timeLimitFields');
        timeLimitFields.classList.toggle('hidden', !checkbox.checked);
    }
</script>
