<div class="w-3/4 h-full py-4 rounded-lg shadow bg-base-200 mt-7" x-show="currentStep === 3" x-transition.500ms>
    <div class="grid h-full grid-cols-8 grid-rows-8">
        <div class="flex items-center justify-center col-start-1 row-start-8">
            <button class="btn btn-outline btn-sm" x-on:click="currentStep--">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
            </button>
        </div>
        <div class="col-span-2 col-start-3 row-span-4 mt-3 mr-3 max-h-60">
            <img src="https://placehold.co/1000x1500" alt="">
        </div>
        <div class="col-span-2 col-start-5 mt-3">
            <h2 class="text-2xl tracking-[0.1rem] font-light w-full mt-2">{{ $productName }}</h2>
            {{-- <span class="mr-1 badge badge-accent">{{ $category }}</span>
            <span class="badge badge-accent">{{ $subcategory }}</span> --}}
        </div>
        <div class="col-start-5 max-h-12">
            <h3 class="text-2xl tracking-[0.1rem] font-light">
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
            </h3>
        </div>
        <div class="col-span-2 col-start-5 row-start-3 max-h-12">
            <p>{{ $productDescription }}</p>
        </div>
        <div class="flex items-center justify-center col-start-8 row-start-8">
            <button class="btn btn-outline btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </button>
        </div>
    </div>
</div>
@script
    <script>
        document.addEventListener('livewire:initialized', () => {
            // console.log(Livewire.getByName('admin.products.create.admin-create-product'));
            // console.log(Livewire.all())
        })
    </script>
@endscript
