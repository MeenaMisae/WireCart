<div>
    @if ($showAddSubcategoryForm)
        <div class="flex justify-end">
            <button class="btn btn-sm btn-outline mr-8" wire:click="showSubcategoriesTable">voltar</button>
        </div>
        <livewire:admin.subcategories.admin-create-subcategory />
    @endif
    @if ($showSubcategories)
        <div class="flex justify-end">
            <button class="btn btn-sm btn-outline mr-8" wire:click="addSubcategory">adicionar subcategoria</button>
        </div>
        <div class="px-16 mt-3">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <label>
                                    <input type="checkbox" class="checkbox" />
                                </label>
                            </th>
                            <th>subcategoria</th>
                            <th>qtd. de produtos</th>
                            <th>data de criação</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox" />
                                    </label>
                                </th>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="avatar">
                                            <div class="mask mask-squircle w-12 h-12">
                                                <img src="/tailwind-css-component-profile-2@56w.png"
                                                    alt="Avatar Tailwind CSS Component" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{ $subcategory->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-ghost badge-sm">{{ count($subcategory->products) }}</span>
                                </td>
                                <td>
                                    <span
                                        class="badge badge-ghost badge-sm">{{ $subcategory->created_at->format('d/m/y') }}</span>
                                    <span
                                        class="badge badge-ghost badge-sm">{{ $subcategory->created_at->format('H:i') }}</span>
                                </td>
                                <th>
                                    <button class="btn btn-ghost btn-xs">detalhes</button>
                                </th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
