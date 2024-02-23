<div>
    <div class="lg:flex justify-center items-center hidden lg:p-5">
        <h1 class="text-3xl font-light tracking-[0.2rem]">adicionar novo produto</h1>
    </div>
    <div class="flex flex-col justify-center items-center">
        <ul class="timeline">
            <li>
                <div class="timeline-start timeline-box">Criação</div>
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <hr />
            </li>
            <li>
                <hr />
                <div class="timeline-start timeline-box">Fotos</div>
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <hr />
            </li>
            <li>
                <hr />
                <div class="timeline-start timeline-box">Revisão</div>
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </li>
        </ul>
        <div class="bg-base-200 rounded-lg shadow h-full w-8/12 px-10 py-3">
            <div class="grid grid-cols-12 grid-rows-4 h-full w-full gap-4">
                <div class="col-start-1 col-span-4 flex flex-col justify-center items-center">
                    <label for="" class="label">nome do produto:</label>
                    <input wire:model.live="productName" type="text" class="input input-bordered w-full">
                </div>
                <div class="col-start-1 col-span-4 flex justify-center">
                    @error('productName')
                        <span class="text-error lowercase">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-start-5 col-span-3 row-start-1 flex flex-col justify-center items-center">
                    <label for="categoryID" class="label">categoria:</label>
                    <select wire:model.live="categoryID" wire:change="loadSubcategories" name="categoryID"
                        id="categoryID" class="select select-bordered w-full">
                        <option value="0" selected disabled>selecione a categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-start-4 col-span-2">
                    @error('categoryID')
                        <span class="text-error lowercase">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-6">
            <button class="btn btn-outline btn-sm" wire:click="createProduct">salvar</button>
        </div>
    </div>
</div>
{{-- <div class="bg-base-200 rounded-lg shadow p-8 mt-7 lg:mt-0">
        <div class="grid grid-cols-8 grid-rows-4 max-h-full">
            <div class="col-start-1 col-span-2">
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
        </div> --}}
</div>
