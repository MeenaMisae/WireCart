<div x-data="{ showProductForm: false }">
    <div>
        <div class="flex justify-end mr-4">
            <button class="btn btn-sm btn-outline" x-show="! showProductForm"
                x-on:click="showProductForm = ! showProductForm; showNavbar = ! showNavbar">
                <span x-show="! showProductForm">adicionar produto</span>
            </button>
        </div>
        <div x-show="showProductForm" x-transition.duration.200ms>
            <livewire:admin.products.create.admin-create-product />
        </div>
        <div x-show="! showProductForm" x-transition.duration.500ms>
            @if ($products->count() > 0)
                <div class="px-16 mt-3">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>
                                        <label>
                                            <input type="checkbox" class="checkbox" />
                                        </label>
                                    </th>
                                    <th>nome</th>
                                    <th>em estoque</th>
                                    <th>categoria</th>
                                    <th>subcategoria</th>
                                    <th>criação</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="text-center">
                                        <th>
                                            <label>
                                                <input type="checkbox" class="checkbox" />
                                            </label>
                                        </th>
                                        <td class="text-center">
                                            <div class="flex justify-center items-center w-full gap-4">
                                                <div class="avatar">
                                                    <div class="mask mask-squircle w-12 h-12">
                                                        <img src="" alt="Avatar Tailwind CSS Component" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="font-bold">{{ $product->name }}</div>
                                                    <div class="text-sm opacity-65">{{ $product->category->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            Zemlak, Daniel and Leannon
                                            <br />
                                            <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->subcategory->name }}</td>
                                        <td>
                                            <span class="badge badge-ghost">
                                                {{ $product->created_at->format('d/m/y') }}
                                            </span>
                                            <span class="badge badge-ghost">
                                                {{ $product->created_at->format('H:i') }}
                                            </span>
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
            @else
                <div class="flex justify-center items-center">
                    <div class="flex flex-col h-full">
                        <img class="h-96" src="{{ asset('images/fallback_images/not_found_image.svg') }}"
                            alt="">
                        <h4 class="text-2xl mt-10">Hmm...parece que não tem nada aqui.</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
