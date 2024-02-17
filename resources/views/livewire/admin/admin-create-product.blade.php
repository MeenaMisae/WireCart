<div class="flex justify-center h-full gap-8 lg:h-[70vh] px-10">
    <div class="bg-base-200 rounded-lg shadow p-8 mt-7 lg:mt-0">
        <div class="grid grid-cols-8 grid-rows-4 max-h-full">
            <div class="col-start-1 col-span-3 row-span-2 avatar flex justify-center">
                <div class="h-[20rem] rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                    <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
            <div class="col-start-2 row-start-4 flex justify-center mt-3 w-full">
                <input type="file" name="" id="uploadProductImage" hidden />
                <label for="uploadProductImage" class="btn btn-sm btn-outline">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4c0 .6.4 1 1 1h14c.6 0 1-.4 1-1v-4c0-.6-.4-1-1-1h-2M8 9l4-5 4 5m1 8h0"/>
                      </svg>
                    carregar foto
                </label>
            </div>
            <div class="col-start-4 col-span-2">
                <div class="max-w-96">
                    <div class="flex flex-col justify-center items-center">
                        <label for="" class="label">nome do produto:</label>
                        <input wire:model.live="productName" type="text" class="input input-bordered w-full">
                        <div class="mt-2">
                            @error('productName')
                                <span class="text-error lowercase">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex ml-3">
                <div>
                    <div class="flex justify-center items-center flex-col">
                        <label for="categoryID" class="label">categoria:</label>
                        <select wire:model.live="categoryID" wire:change="loadSubcategories" name="categoryID"
                            id="categoryID" class="select select-bordered">
                            <option value="0" selected disabled>selecione a categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 text-center">
                        @error('categoryID')
                            <span class="text-error lowercase">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @isset($subcategories)
                    @if (count($subcategories))
                        <div class="ml-3" wire:transition.duration.150ms>
                            <div class="flex justify-center items-center flex-col">
                                <label for="subcategoryID" class="label">subcategoria:</label>
                                <select wire:model.live="subcategoryID" wire:change="loadSubcategories" name="subcategoryID"
                                    id="subcategoryID" class="select select-bordered">
                                    <option value="0" selected disabled>selecione a subcategoria</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center mt-2">
                                @error('subcategoryID')
                                    <span class="text-error lowercase">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                @endisset
            </div>
            <div class="col-start-4 col-span-2 mt-10">
                <div class="max-w-96">
                    <div class="flex flex-col justify-center items-center">
                        <div class="flex items-center">
                            <label for="" class="label">
                                descrição do produto:
                            </label>
                            <span
                                class="badge badge-info badge-sm @error('productDescription') badge-error @enderror">{{ strlen($productDescription) }}</span>
                        </div>
                        <textarea placeholder="escreva a descrição do produto" wire:model.live="productDescription"
                            class="textarea textarea-bordered textarea-md w-full h-28"></textarea>
                        <div class="mt-2 text-center">
                            @error('productDescription')
                                <span class="text-error lowercase">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-start-6 mt-10 flex gap-3">
                <div class="ml-3">
                    <label for="" class="label">preço:</label>
                    <input wire:model.live="productPrice" wire:keyup="calculateDiscount" type="number" step="5"
                        min="0" placeholder="0.00" class="input input-bordered w-32">
                </div>
                <div>
                    <label for="" class="label">qtd:</label>
                    <input wire:model.live="productQuantity" type="number" step="1"
                        min="0" placeholder="0" class="input input-bordered w-32">
                </div>

                <div class="flex flex-col items-center">
                    <label for="" class="label">promocional?</label>
                    <input wire:model.live="onSale" type="checkbox" class="checkbox">
                </div>

            </div>
            <div class="col-start-4 row-start-4 col-span-4">
                @if ($onSale)
                    <div class="w-full" wire:transition.duration.150ms>
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
                            @endif
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

                @endif
                <div class="flex justify-center mt-6">
                    <button class="btn btn-outline btn-sm" wire:click="createProduct">salvar</button>
                </div>
            </div>

        </div>


    </div>
