<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full']) }}>
    {{ $slot }}
</button>
