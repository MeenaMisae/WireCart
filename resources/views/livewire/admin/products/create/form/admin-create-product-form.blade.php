<div class="w-3/4 h-full py-4 rounded-lg shadow bg-base-200 mt-7" x-show="currentStep === 1" x-transition.500ms>
    <div class="grid h-full grid-cols-8 grid-rows-4">
        <div class="flex items-center justify-center col-start-1 row-start-4">
            <button class="btn btn-outline btn-sm"
                x-on:click="showProductForm = ! showProductForm; showNavbar = ! showNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col items-center max-h-full col-span-2 col-start-2">
            <label for="" class="label">nome do produto:</label>
            <input wire:model.live="productName" type="text" class="w-64 input input-bordered">
            <div class="h-7">
                @error('productName')
                    <span class="lowercase text-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col items-center max-h-full col-span-2 col-start-4 ml-6">
            <label for="categoryID" class="label">categoria:</label>
            <select wire:model.live="categoryID" wire:change="loadSubcategories" name="categoryID" id="categoryID"
                class="select select-bordered w-52">
                <option value="0" selected disabled>selecione a categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="h-2">
                @error('categoryID')
                    <span class="lowercase text-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        @isset($subcategories)
            @if (count($subcategories))
                <div class="flex flex-col items-center col-span-2 col-start-6" wire:transition.duration.150ms>
                    <label for="" class="label">subcategoria:</label>
                    <select wire:model.live="subcategoryID" name="subcategoryID" id="subcategoryID"
                        class="select select-bordered w-52">
                        <option value="0" selected disabled>selecione a subcategoria</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                    <div class="h-2">
                        @error('subcategoryID')
                            <span class="lowercase text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif
        @endisset
        <div class="flex flex-col items-center col-span-2 col-start-2 row-span-2 row-start-2">
            <div class="flex items-center">
                <label for="" class="label mr-1.5">descrição do produto:</label>
                <span
                    class="badge badge-info badge-sm
                    @error('productDescription') badge-error @enderror">
                    {{ strlen($productDescription) }}
                </span>
            </div>
            <textarea wire:model.live="productDescription" type="text"
                class="w-full h-full resize-none textarea textarea-bordered"></textarea>
            <div class="h-2">
                @error('productDescription')
                    <span class="lowercase text-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col items-center col-span-2 col-start-4 row-start-2 ml-6">
            <label for="" class="label">preço:</label>
            <input wire:model.live="productPrice" wire:keyup="calculateDiscount" type="number" step="5"
                min="0" placeholder="0.00" class="input input-bordered w-52">
            <div class="h-2">
                @error('productPrice')
                    <span class="lowercase text-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col items-center col-span-2 col-start-6 row-start-2">
            <div class="flex">
                <div>
                    <label for="" class="label">qtd:</label>
                    <input wire:model.live="productQuantity" type="number" step="1" min="0"
                        placeholder="0" class="input input-bordered w-36">
                    <div class="h-2 w-36">
                        @error('productQuantity')
                            <span class="lowercase text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <label for="" class="label">promocional?</label>
                    <input wire:model.live="onSale" type="checkbox" class="checkbox">
                </div>
            </div>
        </div>
        @if ($onSale)
            <div class="w-full col-span-3 col-start-4 row-start-3 mt-8 ml-14" wire:transition.duration.150ms>
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

        <div class="flex items-center justify-center col-start-8 row-start-4">
            <button class="btn btn-outline btn-sm" @if ($errors->any()) disabled @endif
                x-on:click="currentStep++" wire:click="nextStep">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </button>
        </div>
    </div>
</div>
