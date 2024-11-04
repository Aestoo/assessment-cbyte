<form>
    @csrf
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input
            id="password"
            type="password"
            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-gray-700"
            required
        />
    </div>

    <div class="mb-4">
        <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm
            Password</label>
        <input
            id="confirmPassword"
            type="password"
            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-gray-700"
            required
        />
    </div>

    <div class="mb-4">
        <label for="amountOfUsages" class="block text-sm font-medium text-gray-700">Amount of
            Usages</label>
        <input
            id="amountOfUsages"
            type="number"
            min="1"
            value="1"
            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-gray-700"
        />
    </div>

    <div class="mb-4 flex items-center">
        <input
            id="limitedTime"
            type="checkbox"
            class="h-4 w-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500"
            onclick="toggleTimeLimitFields()"
        />
        <label for="limitedTime" class="ml-2 block text-sm font-medium text-gray-700">Set Time
            Limit</label>
    </div>

    <div id="timeLimitFields" class="hidden flex items-center space-x-4">
        <div class="flex-1">
            <label for="validForHours" class="block text-sm font-medium text-gray-700">Valid For (Hours)</label>
            <input
                id="validForHours"
                type="number"
                min="0"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-gray-700"
                placeholder="Hours"
            />
        </div>

        <div class="flex-1">
            <label for="validForMinutes" class="block text-sm font-medium text-gray-700">Valid For (Minutes)</label>
            <input
                id="validForMinutes"
                type="number"
                min="0"
                max="59"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-gray-700"
                placeholder="Minutes"
            />

        </div>
    </div>


    <button type="submit"
            class="mt-4 w-full rounded-md bg-gray-800 px-4 py-2 text-white font-semibold hover:bg-gray-700">
        Generate Link
    </button>
</form>
