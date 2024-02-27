<div class="bg-base-200 rounded-lg shadow w-3/4 p-8 mt-7 min-h-full" x-show="currentStep === 2" x-transition.500ms>
    <div class="flex h-full w-full">
        <div class="flex justify-center items-center">
            <button class="btn btn-outline btn-sm mr-6" x-on:click="currentStep--">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col justify-center items-center w-full max-h-full">
            @isset($files)
                <div class="grid grid-cols-2 h-full w-full gap-4">
                    @foreach ($files as $index => $value)
                        <div class="bg-base-300 rounded-lg shadow p-5 mb-2 flex items-center indicator w-full">
                            @if ($index === 0)
                                <span class="indicator-item indicator-center badge badge-accent">Imagem de destaque</span>
                            @endif
                            <div class="flex flex-col py-4 mr-4">
                                <button class="btn btn-ghost btn-circle btn-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                                <button class="btn btn-ghost btn-circle btn-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m7.848 8.25 1.536.887M7.848 8.25a3 3 0 1 1-5.196-3 3 3 0 0 1 5.196 3Zm1.536.887a2.165 2.165 0 0 1 1.083 1.839c.005.351.054.695.14 1.024M9.384 9.137l2.077 1.199M7.848 15.75l1.536-.887m-1.536.887a3 3 0 1 1-5.196 3 3 3 0 0 1 5.196-3Zm1.536-.887a2.165 2.165 0 0 0 1.083-1.838c.005-.352.054-.695.14-1.025m-1.223 2.863 2.077-1.199m0-3.328a4.323 4.323 0 0 1 2.068-1.379l5.325-1.628a4.5 4.5 0 0 1 2.48-.044l.803.215-7.794 4.5m-2.882-1.664A4.33 4.33 0 0 0 10.607 12m3.736 0 7.794 4.5-.802.215a4.5 4.5 0 0 1-2.48-.043l-5.326-1.629a4.324 4.324 0 0 1-2.068-1.379M14.343 12l-2.882 1.664" />
                                    </svg>
                                </button>
                            </div>
                            <img class="h-24 hover:scale-105 transition-all ease-in-out cursor-pointer rounded"
                                src="{{ $value->temporaryUrl() }}" alt=""
                                x-on:click="$('#image-{{ $index }}').click()">
                            <input type="file" id="image-{{ $index }}" wire:model="files.{{ $index }}"
                                hidden>
                        </div>
                    @endforeach
                </div>
            @endisset
            <div>
                <label for="productImages" class="btn btn-outline w-[30vw] mt-4">adicionar imagens</label>
                <input type="file" name="" id="productImages" wire:model="files" hidden multiple>
            </div>
        </div>
        <div class="flex items-center justify-center">
            <button class="btn btn-outline btn-sm ml-6" x-on:click="currentStep++">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </button>
        </div>
    </div>
</div>
