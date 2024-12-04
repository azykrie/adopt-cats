<div>
    <x-nav sticky full-width>
        <x-slot:brand>
            <!-- Brand -->
            <div class="btn-ghost btn-sm flex items-center">
                <a href="#home" class="ml-2">App</a>
            </div>
        </x-slot:brand>

        <x-slot:actions>
            <!-- Desktop Navigation -->
            <div class="hidden lg:flex space-x-4">
                <x-button label="Home" Link="#home" class="btn-ghost" responsive />
                <x-button label="Cats" Link="#cats" class="btn-ghost" responsive />
                <x-button label="How to Adopt" Link="#howtoadopt" class="btn-ghost" responsive />
            </div>

            <!-- Mobile Menu -->
            <div class="lg:hidden">
                <label for="mobile-menu-toggle" class="cursor-pointer">
                    <x-icon name="o-bars-3" class="w-6 h-6" />
                </label>
                <input type="checkbox" id="mobile-menu-toggle" class="hidden peer" />
                <div class="hidden peer-checked:block absolute right-0 mt-2 bg-white shadow-md rounded-md z-50 w-48">
                    <x-button label="Home" Link="#home" class="btn-ghost w-full" responsive />
                    <x-button label="Cats" href="#cats" class="btn-ghost w-full" responsive />
                    <x-button label="How to Adopt" Link="#howtoadopt" class="btn-ghost w-full" responsive />
                </div>
            </div>
        </x-slot:actions>
    </x-nav>

    <div>
        <section id="home">
            <div class="mb-5">
                @if(!Request::is('detail-blog'))
                <div class="relative">
                    <img src="{{ asset('img/cats.jpg') }}" alt="Welcome Image" class="w-full h-[400px] object-cover" />
                    <div class="absolute inset-0 bg-black/80"></div>
                    <div
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center text-white p-5 rounded-lg">
                        <h1 class="font-bold text-3xl">Adopt your cat now!</h1>
                        <p class="mt-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis molestiae minus
                            odit accusantium repellendus et expedita est dolorum placeat odio enim atque voluptatibus
                            vel
                            quisquam,
                            laborum magnam. Fugiat, facilis dolor?
                        </p>
                    </div>
                </div>
                @endif
            </div>
        </section>
    </div>

    <div>
        <section id="cats">
            <div class="container mx-auto px-4 py-8 bg-gray-100">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($cats as $item)
                    <div class="w-full">
                        <x-card title="{{ $item->cat_name }}"
                            class="bg-white shadow-lg rounded-lg overflow-hidden h-full">
                            <x-slot:figure>
                                <img src="{{ asset('storage/'.$item->cat_image) }}" class="w-full h-48 object-cover" />
                            </x-slot:figure>

                            <div class="p-6 flex flex-col justify-between flex-grow">
                                <div>
                                    <p class="text-gray-700 text-base">{{ Str::limit($item->about, 100) }}</p>
                                </div>

                                <div class="mt-4">
                                    <x-button label="Adopt" class="btn-primary w-full"
                                        onclick="window.open('{{ $this->getWhatsAppAdoptLink($item->cat_name) }}')" />
                                </div>
                            </div>
                        </x-card>
                    </div>
                    @endforeach
                </div>
                <div class="mt-3">
                    {{$cats->Links()}}
                </div>
            </div>
        </section>
    </div>

    <div>
        <section id="howtoadopt">
            <div class="flex flex-col items-center justify-center max-w-2xl mx-auto my-8 px-4">
                <h2 class="text-3xl font-bold mb-6 text-center">How to Adopt</h2>

                <div class="w-full">
                    <x-timeline-item title="Order placed" first icon="o-map-pin">
                        <p class="text-sm text-gray-600">Choose your furry friend and place an order.</p>
                    </x-timeline-item>

                    <x-timeline-item title="Payment confirmed" icon="o-credit-card">
                        <p class="text-sm text-gray-600">Complete the payment process.</p>
                    </x-timeline-item>

                    <x-timeline-item title="Shipped" icon="o-paper-airplane">
                        <p class="text-sm text-gray-600">Your new pet is on its way to you.</p>
                    </x-timeline-item>

                    <x-timeline-item title="Delivered" pending last icon="o-gift">
                        <p class="text-sm text-gray-600">Welcome your new family member!</p>
                    </x-timeline-item>
                </div>
            </div>
        </section>
    </div>
    <div>
        <footer class="bg-gray-100 py-12">
            <div class="border-t mt-8 pt-6 text-center">
                <p class="text-gray-600">
                    © 2024 Company Name. All Rights Reserved.
                </p>
                <div class="flex justify-center space-x-4 mt-4">
                    <a href="#" class="text-gray-600 hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                            </path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </footer>
    </div>    
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const target = document.querySelector(this.getAttribute('href'));
        
        window.scrollTo({
            top: target.offsetTop - 80,  // Menambahkan offset untuk mengatasi navbar sticky
            behavior: 'smooth'
        });
    });
});

    </script>
</div>