<div class="w-3/4 h-full py-4 rounded-lg shadow bg-base-200 mt-7" x-show="currentStep === 3" x-transition.500ms>
    <div class="flex justify-between w-full items-center p-8">
        <button class="btn btn-outline btn-sm" x-on:click="currentStep--">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>
        </button>
        <div class="flex gap-4">
            <div class="w-[20rem]">
                @isset($productImages)
                    <div class="swiper mySwiper rounded-md shadow-sm">
                        <div class="swiper-wrapper h-auto max-w-full object-cover">
                            @foreach ($productImages as $image)
                                <img class="swiper-slide cursor-pointer" src="{{ $image }}"
                                    x-on:click="$('.swiper-button-next').click()">
                            @endforeach
                        </div>
                        <div class="swiper-button-next hidden"></div>
                    </div>
                @endisset
            </div>
            <div class="flex flex-col">
                <div class="mb-2">
                    <h2 class="text-2xl tracking-[0.1rem] font-light w-full mt-3">{{ $productName }}</h2>
                </div>
                <div>
                    <div class="text-2xl tracking-[0.1rem] font-light">
                        @if ($onSale)
                            <div class="mb-1">
                                <div class="flex items-center gap-2">
                                    <div class="line-through text-sm">
                                        {{ 'R$' . $productPrice }}
                                    </div>
                                    <span
                                        class="badge badge-info badge-sm label-text font-semibold">{{ $productDiscount * 100 }}%</span>
                                </div>
                                <div>
                                    {{ 'R$' . $productFinalPrice }}
                                </div>
                            </div>
                        @else
                            {{ 'R$' . $productPrice }}
                        @endif
                    </div>
                </div>
                <div class="h-auto w-80 mt-2">
                    <p>{{ $productDescription }}</p>
                </div>
                <div class="mt-3">
                    @isset($productQuantity)
                        @if ($productQuantity <= 5)
                            <span class="badge badge-warning font-semibold">{{ $productQuantity }}
                                {{ $productQuantity > 1 ? 'disponíveis' : 'disponível' }}</span>
                        @endif
                    @endisset
                </div>
            </div>
        </div>
        <button class="btn btn-outline btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
        </button>
    </div>
</div>
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('images_received', () => {
            setTimeout(() => {
                const swiper = new Swiper('.mySwiper', {
                    effect: 'fade',
                    loop: true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                })
            }, 200);
        })
    })
</script>
