<div class="flex justify-center">
    <div class="bg-base-200 rounded-lg shadow p-7 mt-7 lg:mt-0 w-4/5 lg:w-1/2">
        <div class="form-control justify-center items-center lg:gap-4">
            <div class="lg:w-72 md:w-72 w-full">
                <div class="flex flex-col justify-center items-center">
                    <label for="" class="label">nome do produto:</label>
                    <input wire:model.live="productName" type="text" class="input input-bordered w-full">
                    @error('productName')
                        <div class="mt-2 max-w-sm text-center">
                            <span class="text-error lowercase">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="lg:flex lg:gap-4 mt-5 lg:mt-3">
                <div class="flex flex-col justify-center items-center">
                    <label for="categoryID" class="label">categoria:</label>
                    <select wire:model.live="categoryID" wire:change="loadSubcategories" name="categoryID"
                        id="categoryID" class="select select-bordered">
                        <option value="0" selected disabled>selecione a categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div class="lg:h-3 text-center mt-2">
                        @error('categoryID')
                            <span class="text-error lowercase">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @isset($subcategories)
                    @if (count($subcategories))
                        <div class="flex flex-col justify-center items-center">
                            <label for="subcategoryID" class="label">subcategoria:</label>
                            <select wire:model.live="subcategoryID" wire:change="loadSubcategories" name="subcategoryID"
                                id="subcategoryID" class="select select-bordered">
                                <option value="0" selected disabled>selecione a subcategoria</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                            <div class="mt-2 h-3">
                                @error('subcategoryID')
                                    <span class="text-error lowercase">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                @endisset
            </div>
            <div class="flex mt-5 lg:mt-0">
                <div>
                    <label for="" class="label">preço:</label>
                    <input wire:model.live="productPrice" wire:keyup="calculateDiscount" type="number" step="5"
                        min="0" placeholder="0.00" class="input input-bordered w-32">
                </div>
                <div class="flex flex-col items-center">
                    <label for="" class="label">promocional?</label>
                    <input wire:model.live="onSale" type="checkbox" class="checkbox">
                </div>
            </div>
            @if ($onSale)
                <div class="w-full lg:w-3/4" wire:transition.duration.150ms>
                    <div class="flex items-center w-full">
                        <label for="" class="label">
                            desconto:
                        </label>
                        <div class="flex justify-end w-full">
                            <span class="badge badge-accent badge-lg">{{ $productDiscount }}%</span>
                        </div>
                    </div>
                    <input wire:model.live="productDiscount" wire:change="calculateDiscount" type="range"
                        min="0" max="95" value="0" class="range range-accent range-xs"
                        step="5" />
                    <div class="w-full flex justify-between text-xs px-2">
                        @for ($i = 0; $i <= 95; $i += 5)
                            <span>|</span>
                        @endfor
                    </div>
                </div>
                @if ($productFinalPrice && !empty($productPrice))
                    <div class="flex justify-center mt-5">
                        <span class="badge badge-lg badge-accent">
                            preço final:
                            {{ 'R$ ' . $productFinalPrice }}
                        </span>
                    </div>
                @endif
            @endif
        </div>
        <div class="flex justify-center mt-7">
            <button class="btn btn-outline btn-sm" wire:click="createProduct">salvar</button>
        </div>
    </div>
</div>
