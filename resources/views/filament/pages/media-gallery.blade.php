<x-filament-panels::page>
    <div class="space-y-6">
        @if (count($mediaFiles) === 0)
            <div class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-gray-300 bg-gray-50 py-20 dark:border-gray-600 dark:bg-gray-900">
                <svg class="mb-4 h-20 w-20 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0 0 22.5 18.75V5.25A2.25 2.25 0 0 0 20.25 3H3.75A2.25 2.25 0 0 0 1.5 5.25v13.5A2.25 2.25 0 0 0 3.75 21Z" />
                </svg>
                <p class="text-lg font-medium text-gray-500">Belum ada media</p>
                <p class="mt-1 text-sm text-gray-400">Upload gambar melalui form artikel, paket wisata, destinasi, atau tombol Upload di atas.</p>
            </div>
        @else
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
                @foreach ($mediaFiles as $file)
                    <div
                        x-data="{ open: false }"
                        class="group relative overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition-all duration-300 hover:shadow-md dark:border-gray-700 dark:bg-gray-800"
                    >
                        <div class="aspect-square overflow-hidden bg-gray-100 dark:bg-gray-700">
                            <img
                                src="{{ $file['url'] }}"
                                alt="{{ $file['name'] }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
                                loading="lazy"
                            >
                        </div>

                        <div class="border-t border-gray-100 p-2.5 dark:border-gray-700">
                            <p class="truncate text-xs font-medium text-gray-700 dark:text-gray-300">{{ $file['name'] }}</p>
                            <p class="mt-0.5 text-xs text-gray-400 dark:text-gray-500">
                                <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-2 py-0.5 text-xs dark:bg-gray-700">{{ $file['directory'] }}</span>
                                <span class="ml-1">{{ $file['size_formatted'] }}</span>
                            </p>
                        </div>

                        <div class="absolute inset-0 flex items-center justify-center gap-3 rounded-xl bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            <a
                                href="{{ $file['url'] }}"
                                target="_blank"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white text-gray-700 shadow-lg transition hover:bg-white hover:text-primary-600"
                                title="Lihat"
                            >
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>

                            <button
                                type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white text-red-500 shadow-lg transition hover:bg-white hover:text-red-700"
                                title="Hapus"
                                wire:click="deleteImage('{{ $file['path'] }}')"
                                wire:confirm="Hapus gambar ini?"
                            >
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex items-center justify-between rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 dark:border-gray-700 dark:bg-gray-900">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Total: <span class="font-medium text-gray-700 dark:text-gray-300">{{ count($mediaFiles) }}</span> gambar
                </p>
            </div>
        @endif
    </div>
</x-filament-panels::page>
