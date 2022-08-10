<div>
    <div class="mb-4">
        <label for="{{ $for }}"
            class="block text-gray-700 text-sm font-bold mb-2">{{ ucfirst($for) }}:</label>
        <input type="text" $id="{{ $id }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $class }} "
            placeholder="Enter {{ ucfirst($for) }}" wire:model="{{ $name }}">
        @error($name)
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
</div>
