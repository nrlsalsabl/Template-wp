<div class="md:px-1">
    <div class="text-white md:text-left">
        <h1 class="text-4xl md:text-7xl font-medium mb-4 md:mb-0 mt-10">Siap Untuk Membuat Project?</h1>
        <p class="mt-3 md:mt-5 text-lg md:text-2xl">Start finding your purpose with us. See our latest vacancies below.</p>
    </div>

    <div class="flex flex-col space-y-8 mt-14 md:mt-20 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-12">
            <div class="flex flex-col w-full">
                <label for="name" class="text-white mb-2">Nama Kamu</label>
                <input type="text" id="name" name="name" placeholder="What’s your Name?"
                    class="border-b-2 border-gray-300 bg-transparent py-2 text-white text-lg md:text-2xl focus:outline-none focus:border-blue-500 w-full" />
            </div>
            <div class="flex flex-col w-full">
                <label for="email" class="text-white mb-2">Email</label>
                <input type="email" id="email" name="email" placeholder="What’s your Email?"
                    class="border-b-2 border-gray-300 bg-transparent py-2 text-white text-lg md:text-2xl focus:outline-none focus:border-blue-500 w-full" />
            </div>
            <div class="flex flex-col w-full">
                <label for="phone" class="text-white mb-2">No Telpon</label>
                <input type="tel" id="phone" name="phone" placeholder="What’s your Number?"
                    class="border-b-2 border-gray-300 bg-transparent py-2 text-white text-lg md:text-2xl focus:outline-none focus:border-blue-500 w-full" />
            </div>
        </div>

        <div class="flex flex-col">
            <label for="subject" class="text-white mb-2">Project Subject</label>
            <input type="text" id="subject" name="subject" placeholder="Masukkan subject proyek"
                class="border-b-2 border-gray-300 text-lg md:text-2xl bg-transparent py-2 text-white focus:outline-none focus:border-blue-500" />
        </div>

        <div class="flex flex-col">
            <label for="message" class="text-white mb-2">Message</label>
            <textarea id="message" name="message" placeholder="Let us know about your detail project" rows="4"
                class="border-b-2 text-lg md:text-2xl border-gray-300 bg-transparent py-2 text-white focus:outline-none focus:border-blue-500"></textarea>
        </div>

        <div class="flex md:justify-start">
            <button type="submit"
                class="bg-purple-500 text-white py-3 px-6 w-48 md:w-64 rounded-full text-lg md:text-xl hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Kirim Pesan Ini
            </button>
        </div>
    </div>
</div>`