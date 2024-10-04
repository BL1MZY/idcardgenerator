<!-- resources/views/components/select.blade.php -->

@props([
    'id' => '',
    'label' => '',
    'name' => '',
    'placeholder' => '',
    'required' => false,
])

<div class="lg:col-span-6 col-span-12">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $label }} {!! $required ? '<span class="text-red-500">*</span>' : '' !!}
    </label>
    <select {{ $attributes->merge(['id' => $id, 'name' => $name, 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-indigo-700 focus:border-indigo-700 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }} {{ $required ? 'required' : '' }}>
        @if ($placeholder)
            <option value="" selected>{{ $placeholder }}</option>
        @endif
        {{ $slot }}
    </select>
    @error($name)
        <p class="text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>