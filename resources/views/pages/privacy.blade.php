<x-layouts.app>
    <x-slot:title>Kebijakan Privasi | Ijen Expedition Trip</x-slot:title>
    
    <div class="bg-gray-50 dark:bg-gray-950 pt-16 sm:pt-24 pb-10 sm:pb-16 lg:pb-20">
        <div class="container-custom max-w-4xl bg-white dark:bg-gray-900 rounded-xl p-8 shadow-sm">
            
            <div class="mb-8 animate-on-scroll border-b border-gray-200 dark:border-gray-800 pb-6">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2 sm:mb-4">
                    {{ $privacy ? $privacy->title : 'Kebijakan Privasi' }}
                </h1>
                <p class="text-sm sm:text-base text-gray-500 dark:text-gray-400">
                    Terakhir diperbarui: {{ $privacy ? $privacy->updated_at->translatedFormat('d M Y') : date('d M Y') }}
                </p>
            </div>

            <div class="prose dark:prose-invert max-w-none animate-on-scroll">
                @if($privacy && $privacy->content)
                    {!! $privacy->content !!}
                @else
                    <p>Ijen Expedition Trip ("kami", "milik kami", atau "kita") menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi yang Anda bagikan kepada kami. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi Anda saat Anda menggunakan layanan kami.</p>

                    <h3>1. Informasi yang Kami Kumpulkan</h3>
                    <p>Kami dapat mengumpulkan informasi identitas pribadi, seperti nama, alamat email, nomor telepon, dan informasi pembayaran, yang Anda berikan secara sukarela saat memesan paket wisata atau menghubungi kami.</p>

                    <h3>2. Penggunaan Informasi</h3>
                    <p>Informasi yang kami kumpulkan digunakan untuk memproses pemesanan Anda, berkomunikasi mengenai layanan yang Anda pesan, dan untuk tujuan administratif lainnya.</p>

                    <h3>3. Keamanan Data</h3>
                    <p>Kami menerapkan langkah-langkah keamanan yang wajar untuk melindungi data pribadi Anda dari akses yang tidak sah, pengubahan, pengungkapan, atau penghancuran.</p>

                    <h3>4. Berbagi Informasi dengan Pihak Ketiga</h3>
                    <p>Kami tidak akan menjual, memperdagangkan, atau menyewakan informasi pribadi Anda kepada pihak ketiga. Kami hanya dapat membagikan informasi Anda dengan mitra terpercaya (seperti penyedia transportasi atau penginapan) yang membantu kami dalam menyelenggarakan trip Anda.</p>

                    <h3>5. Perubahan Kebijakan Privasi</h3>
                    <p>Kami berhak untuk mengubah Kebijakan Privasi ini kapan saja. Setiap perubahan akan diumumkan di halaman ini.</p>
                @endif
            </div>
            
        </div>
    </div>
</x-layouts.app>
