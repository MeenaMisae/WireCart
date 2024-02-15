<div>
    @if ($showAddCategoryForm)
        <div class="flex justify-end">
            <button class="btn btn-sm btn-outline mr-8" wire:click="showCategoriesTable">voltar</button>
        </div>
        <livewire:admin.categories.admin-create-category />
    @endif
    @if ($showCategories)
        <div class="flex justify-end">
            <button class="btn btn-sm btn-outline mr-8" wire:click="addCategory">adicionar categoria</button>
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
                            <th>categoria</th>
                            <th>qtd. de produtos</th>
                            <th>data de criação</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
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
                                            <div class="font-bold">{{ $category->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-ghost badge-sm">{{ $category->products ? count($category->products) : '0' }}</span>
                                </td>
                                <td>
                                    <span
                                        class="badge badge-ghost badge-sm">{{ $category->created_at->format('d/m/y') }}</span>
                                    <span
                                        class="badge badge-ghost badge-sm">{{ $category->created_at->format('H:i') }}</span>
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
