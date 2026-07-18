@props(['categories'])

<div class="glass-panel p-4 sm:p-6 -mt-12 sm:-mt-16 relative z-30 mx-3 sm:mx-4 md:mx-auto max-w-4xl">
    <form action="{{ route('packages.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3 sm:gap-4">
        <div class="flex-1 relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" name="q" id="search" value="{{ request('q') }}" class="form-input pl-9 sm:pl-10 text-sm" placeholder="Cari destinasi atau paket wisata...">
        </div>

        <div class="sm:w-48 lg:w-56 relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
            </div>
            <select name="category" id="category" class="form-input pl-9 sm:pl-10 appearance-none bg-no-repeat bg-right pr-8 text-sm" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke=\'%236b7280\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M19 9l-7 7-7-7\'/></svg>'); background-position: right 0.75rem center; background-size: 1.25em 1.25em;">
                <option value="">Semua Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="sm:w-36 lg:w-44 relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <select name="duration" id="duration" class="form-input pl-9 sm:pl-10 appearance-none bg-no-repeat bg-right pr-8 text-sm" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke=\'%236b7280\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M19 9l-7 7-7-7\'/></svg>'); background-position: right 0.75rem center; background-size: 1.25em 1.25em;">
                <option value="">Semua Durasi</option>
                <option value="1" {{ request('duration') == '1' ? 'selected' : '' }}>1 Hari</option>
                <option value="2" {{ request('duration') == '2' ? 'selected' : '' }}>2 Hari</option>
                <option value="3" {{ request('duration') == '3' ? 'selected' : '' }}>3 Hari</option>
                <option value="4+" {{ request('duration') == '4+' ? 'selected' : '' }}>Lebih dari 3 Hari</option>
            </select>
        </div>

        <button type="submit" class="btn-primary w-full sm:w-auto">
            Cari
        </button>
        @if(request('q') || request('category') || request('duration'))
            <a href="{{ route('packages.index') }}" class="btn-secondary w-full sm:w-auto text-center flex items-center justify-center gap-2">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H12v4" />
                </svg>
                Reset
            </a>
        @endif
    </form>
</div>
