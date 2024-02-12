<div class="flex justify-center">
    <div class="bg-base-200 rounded-lg shadow p-5 w-3/4 mt-5">
        <div class="form-control">
            <label for="" class="label">nome do produto:</label>
            <input type="text" class="input input-bordered">
        </div>
        <div class="form-control w-1/2">
            <label for="" class="label">categoria:</label>
            <select name="" id="" class="select select-bordered">
                <option value="" selected disabled>Selecione</option>
                <option value="1">Feminino</option>
                <option value="2">Masculino</option>
            </select>
        </div>
        <div class="flex justify-between">
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
            <div class="form-control mt-4" wire:transition.duration.150ms>
                <div class="flex items-center w-full">
                    <label for="" class="label">
                        desconto:
                    </label>
                    <div class="flex justify-end w-full">
                        <span class="badge badge-accent badge-lg">{{ $productDiscount }}%</span>
                    </div>
                </div>
                <input wire:model.live="productDiscount" wire:change="calculateDiscount" type="range" min="0"
                    max="95" value="0" class="range range-accent range-xs" step="5" />
                <div class="w-full flex justify-between text-xs px-2">
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
                    <span>|</span>
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
</div>
