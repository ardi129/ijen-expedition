@props(['tourPackage'])

<form action="{{ route('booking.store') }}" method="POST" class="space-y-5 sm:space-y-6" id="booking-form" novalidate>
    @csrf

    <input type="hidden" name="tour_package_id" value="{{ $tourPackage->id }}">

    <div class="space-y-4">
        <div class="form-group">
            <label for="name" class="form-label">Nama Lengkap <span class="text-red-500">*</span></label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input @error('name') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" required data-msg-required="Nama lengkap wajib diisi">
            @error('name')
                <div class="mt-2 text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg p-2 flex items-center">
                    <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>{{ $message }}</span>
                </div>
            @enderror
            <div class="invalid-feedback hidden mt-2 text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg p-2 flex items-center">
                <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="feedback-text"></span>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="form-group">
                <label for="email" class="form-label">Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input @error('email') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" required data-msg-required="Email wajib diisi" data-msg-email="Format email tidak valid">
                @error('email')
                    <div class="mt-2 text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg p-2 flex items-center">
                        <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
                <div class="invalid-feedback hidden mt-2 text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg p-2 flex items-center">
                    <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="feedback-text"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">No. WhatsApp / Telp <span class="text-red-500">*</span></label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="form-input @error('phone') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" required data-msg-required="Nomor WhatsApp/Telp wajib diisi">
                @error('phone')
                    <div class="mt-2 text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg p-2 flex items-center">
                        <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
                <div class="invalid-feedback hidden mt-2 text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg p-2 flex items-center">
                    <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="feedback-text"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-4 pt-4 sm:pt-5 border-t border-gray-100 dark:border-gray-700">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="form-group">
                <label for="travel_date" class="form-label">Tanggal Perjalanan <span class="text-red-500">*</span></label>
                <input type="date" name="travel_date" id="travel_date" value="{{ old('travel_date') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" class="form-input @error('travel_date') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" required data-msg-required="Tanggal perjalanan wajib dipilih">

                <div id="date_info" class="hidden mt-1 text-xs px-2 py-1 bg-primary-50 text-primary-700 border border-primary-200 rounded">
                    Sistem mendeteksi: <strong id="day_type">Weekday</strong>. (Harga otomatis menyesuaikan)
                </div>

                @error('travel_date')
                    <div class="mt-2 text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg p-2 flex items-center">
                        <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
                <div class="invalid-feedback hidden mt-2 text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg p-2 flex items-center">
                    <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="feedback-text"></span>
                </div>
            </div>

            <div class="form-group number-input-group">
                <label for="number_of_people" class="form-label">Jumlah Peserta <span class="text-red-500">*</span></label>
                <div class="relative flex items-center max-w-[10rem] sm:max-w-[12rem]">
                    <button type="button" class="btn-minus bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 border border-gray-300 dark:border-gray-600 rounded-l-xl p-2.5 sm:p-3 h-11 sm:h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none transition-colors">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                        </svg>
                    </button>
                    <input type="number" name="number_of_people" id="number_of_people" value="{{ old('number_of_people', 1) }}" min="1" max="50" class="form-input !rounded-none !border-x-0 !px-0 text-center h-11 sm:h-12 @error('number_of_people') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" required data-msg-required="Jumlah peserta wajib diisi">
                    <button type="button" class="btn-plus bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 border border-gray-300 dark:border-gray-600 rounded-r-xl p-2.5 sm:p-3 h-11 sm:h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none transition-colors">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                </div>
                @error('number_of_people')
                    <div class="mt-2 text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg p-2 flex items-center">
                        <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
                <div class="invalid-feedback hidden mt-2 text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg p-2 flex items-center">
                    <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="feedback-text"></span>
                </div>
            </div>
        </div>

        <div>
            <label for="special_requests" class="form-label">Permintaan Khusus (Opsional)</label>
            <textarea name="special_requests" id="special_requests" rows="3" class="form-input @error('special_requests') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" placeholder="Contoh: Alergi makanan tertentu, butuh kursi roda, dll.">{{ old('special_requests') }}</textarea>
        </div>
    </div>

    <div class="pt-4 sm:pt-5 border-t border-gray-100 dark:border-gray-700">
        <button type="submit" class="btn-primary w-full sm:w-auto sm:px-12 text-base sm:text-lg">
            Kirim Pemesanan
        </button>
        <p class="mt-3 text-xs text-gray-500 dark:text-gray-400 text-center sm:text-left">
            * Kami akan membalas pesan Anda untuk konfirmasi ketersediaan dan harga final.
        </p>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const translations = {
        weekday: 'Weekday / Hari Biasa',
        weekend: 'Weekend / Hari Libur',
    };

    const form = document.getElementById('booking-form');
    if (!form) return;

    const inputs = form.querySelectorAll('input[required]');

    const validateInput = (input) => {
        const feedbackDiv = input.closest('.form-group').querySelector('.invalid-feedback');
        const feedbackText = feedbackDiv?.querySelector('.feedback-text');

        let isValid = true;
        let errorMessage = '';

        if (input.validity.valueMissing) {
            isValid = false;
            errorMessage = input.dataset.msgRequired || 'This field is required';
        } else if (input.type === 'email' && input.validity.typeMismatch) {
            isValid = false;
            errorMessage = input.dataset.msgEmail || 'Invalid email format';
        }

        if (!isValid) {
            input.classList.add('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            if (feedbackDiv && feedbackText) {
                feedbackText.textContent = errorMessage;
                feedbackDiv.classList.remove('hidden');
            }
        } else {
            input.classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            if (feedbackDiv) {
                feedbackDiv.classList.add('hidden');
            }
        }

        return isValid;
    };

    inputs.forEach(input => {
        input.addEventListener('blur', () => validateInput(input));
        input.addEventListener('input', () => {
            const feedbackDiv = input.closest('.form-group').querySelector('.invalid-feedback');
            if(feedbackDiv && !feedbackDiv.classList.contains('hidden')) {
                input.classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
                feedbackDiv.classList.add('hidden');
            }
        });
    });

    form.addEventListener('submit', (e) => {
        let isFormValid = true;
        inputs.forEach(input => {
            if (!validateInput(input)) {
                isFormValid = false;
            }
        });

        if (!isFormValid) {
            e.preventDefault();
        }
    });

    const dateInput = document.getElementById('travel_date');
    const dateInfo = document.getElementById('date_info');
    const dayType = document.getElementById('day_type');

    if (dateInput && dateInfo && dayType) {
        dateInput.addEventListener('change', function() {
            if (this.value) {
                const date = new Date(this.value);
                const day = date.getDay();
                if (day === 0 || day === 6) {
                    dayType.textContent = translations.weekend;
                    dateInfo.classList.remove('bg-primary-50', 'text-primary-700', 'border-primary-200');
                    dateInfo.classList.add('bg-orange-50', 'text-orange-600', 'border-orange-100');
                } else {
                    dayType.textContent = translations.weekday;
                    dateInfo.classList.remove('bg-orange-50', 'text-orange-600', 'border-orange-100');
                    dateInfo.classList.add('bg-primary-50', 'text-primary-700', 'border-primary-200');
                }
                dateInfo.classList.remove('hidden');
            } else {
                dateInfo.classList.add('hidden');
            }
        });

        if(dateInput.value) {
            dateInput.dispatchEvent(new Event('change'));
        }
    }
});
</script>
