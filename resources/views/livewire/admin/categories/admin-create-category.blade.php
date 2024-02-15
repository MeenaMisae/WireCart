<div class="flex justify-center">
    <div class="bg-base-200 rounded-lg shadow p-7 w-4/5 mt-5 lg:w-1/2">
        <div class="form-control justify-center items-center lg:gap-4">
            <div class="lg:w-72 md:w-72 w-full">
                <div class="flex flex-col justify-center items-center">
                    <label for="" class="label">nome da categoria:</label>
                    <input wire:model.live="categoryName" type="text" class="input input-bordered w-full">
                    @error('categoryName')
                        <div class="mt-2 max-w-sm text-center">
                            <span class="text-error lowercase">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-7">
            <button class="btn btn-outline btn-sm" wire:click="createCategory">salvar</button>
        </div>
    </div>
</div>
