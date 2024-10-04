@props([
    'id' => '',
    'label' => '',
    'type' => 'text',
    'name' => '',
    'placeholder' => '',
    'required' => false,
])

<div class="lg:col-span-6 col-span-12">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $label }} @if($required) <span class="text-red-500">*</span> @endif
    </label>
    <input
        type="{{ $type }}"
        id="{{ $id }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        {{-- @if($required) required @endif --}}
        {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-green-700 focus:border-green-700 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500']) }}
    />
    @error($name)
        <p class="text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>