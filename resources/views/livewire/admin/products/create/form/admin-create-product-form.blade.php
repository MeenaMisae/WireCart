<div class="py-4 rounded-lg shadow bg-base-200 mt-7 h-[70vh] w-[70vw]" x-show="currentStep === 1" x-transition.500ms>
    <div class="grid grid-cols-8 grid-rows-5 h-full w-full gap-6">
        <div class="col-start-1 row-start-3 flex justify-center items-center">
            <button class="btn btn-outline btn-sm"
                x-on:click="showProductForm = ! showProductForm; showNavbar = ! showNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
            </button>
        </div>
        <div class="col-start-3 col-span-2">
            <div class="flex justify-center flex-col items-center w-full">
                <label for="" class="label">nome do produto:</label>
                <input type="text" wire:model.live="productName" class="input-bordered input w-64">
                <div class="w-full flex justify-center mt-1">
                    @error('productName')
                        <span class="lowercase text-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-span-2 col-start-3 row-start-2 row-span-2 mt-4">
            <div class="flex flex-col w-64 h-[14rem]">
                <label for="" class="label w-64 flex justify-center">descrição do produto:</label>
                <textarea wire:model.live="productDescription" class="h-full w-full resize-none textarea textarea-bordered"></textarea>
                <span
                    class="label-text @error('productDescription') text-error @enderror flex justify-end">{{ strlen($productDescription) }}/200</span>
                <div class="h-2">
                    @error('productDescription')
                        <span class="lowercase text-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-start-5 col-span-2">
            <div class="flex flex-col">
                <label for="categoryID" class="label w-52 flex justify-center">categoria:</label>
                <select wire:model.live="categoryID" wire:change="loadSubcategories" name="categoryID" id="categoryID"
                    class="select select-bordered w-52">
                    <option value="0" selected disabled>selecione a categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="h-2 ml-9 mt-1">
                    @error('categoryID')
                        <span class="lowercase text-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        @isset($subcategories)
            @php
                if ($errors->any()):
                    $this->resetErrorBag();
                endif;
            @endphp
            <div class="col-start-5 row-start-2 mt-4">
                <div class="flex flex-col">
                    <label for="" class="label w-52 flex justify-center">subcategoria:</label>
                    <select wire:model.live="subcategoryID" name="subcategoryID" id="subcategoryID"
                        class="select select-bordered w-52">
                        <option selected disabled value="0">selecione a subcategoria</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                    <div class="h-auto w-[24rem] mt-1 ml-6">
                        @error('subcategoryID')
                            <span class="lowercase text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        @endisset
        <div class="col-start-5 row-start-3 mt-5">
            <div class="flex items-center gap-2">
                <div>
                    <label for="" class="label">preço:</label>
                    <input wire:model.live="productPrice"
                        @if ($onSale) wire:keyup="calculateDiscount" @endif type="number"
                        step="5" min="0" placeholder="0.00" class="input input-bordered w-28">
                    <div class="h-2">
                        @error('productPrice')
                            <span class="lowercase text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="" class="label">qtd:</label>
                    <input wire:model.live="productQuantity" type="number" step="1" min="0"
                        placeholder="0" class="input input-bordered w-28">
                    <div class="h-2">
                        @error('productQuantity')
                            <span class="lowercase text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-start-4 row-start-4">
            <div class="flex items-center mt-8 ml-12">
                <label for="" class="label">promocional?</label>
                <input wire:model.live="onSale" type="checkbox" class="checkbox">
            </div>
        </div>
        @if ($onSale)
            <div class="w-full col-span-3 col-start-3 row-start-4 ml-14 mt-20" wire:transition.duration.150ms>
                <div class="flex items-center w-full">
                    <label for="" class="label">
                        desconto:
                    </label>
                    <div class="ml-2">
                        <span class="badge badge-accent badge-lg">{{ $productDiscount }}%</span>
                    </div>
                    @if ($productFinalPrice && !empty($productPrice))
                        <div class="flex justify-end w-full">
                            <span class="badge badge-lg badge-accent">
                                preço final:
                                {{ 'R$ ' . $productFinalPrice }}
                            </span>
                        </div>
                    @else
                        <div class="flex justify-end w-full">
                            <span class="badge badge-lg badge-warning">
                                informe o preço
                            </span>
                        </div>
                    @endif
                </div>
                <input wire:model.live="productDiscount" wire:change="calculateDiscount" type="range" min="0"
                    max="95" value="0" class="range range-accent range-xs" step="5" />
                <div class="flex justify-between w-full px-2 text-xs">
                    @for ($i = 0; $i <= 95; $i += 5)
                        <span>|</span>
                    @endfor
                </div>
                <div class="h-2 mt-2">
                    @error('productDiscount')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif
        <div class="col-start-8 row-start-3 flex justify-center items-center">
            <button class="btn btn-outline btn-sm" wire:click="validateStep" id="btnNextStep"
                @if ($errors->any()) disabled @endif>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </button>
        </div>
    </div>
</div>
@script
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('step_validated', () => {
                const nextStep = $('button#btnNextStep')
                setTimeout(() => {
                    nextStep.attr('wire:click', 'nextStep')
                    nextStep.attr('x-on:click', 'currentStep++')
                }, 100);
                nextStep.click()
            })
        })
    </script>
@endscript
