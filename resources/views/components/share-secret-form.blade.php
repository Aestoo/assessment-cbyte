<form method="POST" action="{{route('secret.share.store')}}">
    @csrf
    <div class="w-full">
        <label for="secret" class="block text-sm font-medium text-gray-700">Secret</label>
        <div class="relative">
            <input
                id="secret"
                name="secret"
                type="text"
                class="mt-1 block w-full p-2 border {{ $errors->has('secret') ? 'border-red-600' : 'border-gray-300' }} rounded-md focus:outline-none focus:ring focus:ring-gray-700"
                placeholder="Secret"
            />
        </div>
        @error('secret')
        <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>


    <div class="flex flex-wrap mt-4">
        <div class="w-full sm:w-1/3 sm:pe-2 pt-2">
            <label for="amountOfUsages" class="block text-sm font-medium text-gray-700">Amount of Usages</label>
            <input
                id="amountOfUsages"
                name="amountOfUsages"
                type="number"
                class="mt-1 block w-full p-2 border {{ $errors->has('amountOfUsages') ? 'border-red-600' : 'border-gray-300' }} rounded-md focus:outline-none focus:ring focus:ring-gray-700"
                placeholder="1"
                value="{{ old('amountOfUsages') }}"
            />
            @error('amountOfUsages')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
            <p class="text-sm text-gray-400 mt-1">Leave empty for unlimited amount of link usages</p>

        </div>

        <div class="w-full sm:w-1/3 sm:px-1 pt-2">
            <label for="validForHours" class="block text-sm font-medium text-gray-700">Valid For (Hours)</label>
            <input
                id="validForHours"
                name="validForHours"
                type="number"
                class="mt-1 block w-full p-2 border {{ $errors->has('validForHours') ? 'border-red-600' : 'border-gray-300' }} rounded-md focus:outline-none focus:ring focus:ring-gray-700"
                placeholder="Hours"
                value="{{ old('validForHours') }}"
            />
            @error('validForHours')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
            <p class="text-sm text-gray-400 mt-1">Leave empty for unlimited hours</p>

        </div>

        <div class="w-full sm:w-1/3 sm:ps-2 pt-2">
            <label for="validForMinutes" class="block text-sm font-medium text-gray-700">Valid For (Minutes)</label>
            <input
                id="validForMinutes"
                name="validForMinutes"
                type="number"
                class="mt-1 block w-full p-2 border {{ $errors->has('validForMinutes') ? 'border-red-600' : 'border-gray-300' }} rounded-md focus:outline-none focus:ring focus:ring-gray-700"
                placeholder="Minutes"
                value="{{ old('validForMinutes') }}"
            />
            @error('validForMinutes')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
            <p class="text-sm text-gray-400 mt-1">Leave empty for unlimited minutes</p>

        </div>
    </div>




    <div class="mt-6">
        <button type="submit"
                class="rounded-md w-full bg-gray-900 px-4 py-2 text-white font-semibold hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-700">
            Generate Link
        </button>
    </div>
</form>
