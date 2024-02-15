<div class="flex justify-center">
    <div class="bg-base-200 rounded-lg shadow p-7 w-4/5 mt-5 lg:w-1/2">
        <div class="form-control justify-center items-center lg:gap-4">
            <div class="lg:w-72 md:w-72 w-full">
                <div class="flex flex-col items-center justify-center w-full">
                    <label for="" class="label">nome da subcategoria:</label>
                    <input wire:model.live="subcategoryName" type="text" class="input input-bordered w-full">
                    @error('subcategoryName')
                        <div class="mt-2 max-w-sm text-center">
                            <span class="text-error lowercase">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mt-4">
                <div class="flex flex-col justify-center items-center">
                    <label for="categoryID" class="label">categoria:</label>
                    <select wire:model.live="categoryID" name="categoryID" id="categoryID"
                        class="select select-bordered">
                        <option value="0" selected disabled>selecione a subcategoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('categoryID')
                    <div class="mt-2">
                        <span class="text-error lowercase">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>
        <div class="flex justify-center mt-7">
            <button class="btn btn-outline btn-sm" wire:click="createSubcategory">salvar</button>
        </div>
    </div>
</div>
