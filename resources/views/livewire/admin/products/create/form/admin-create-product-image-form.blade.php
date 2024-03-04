<div class="w-3/4 min-h-full p-8 rounded-lg shadow bg-base-200 mt-7" x-show="currentStep === 2" x-transition.500ms>
    <div class="flex w-full h-full">
        <div class="flex items-center justify-center">
            <button class="mr-6 btn btn-outline btn-sm" x-on:click="currentStep--">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col items-center justify-center w-full max-h-full" x-data="galleryComponent"
            x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false"
            x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
            @isset($files)
                <div class="grid w-full h-full grid-cols-2 gap-4" id="gallery">
                    @foreach ($files as $index => $value)
                        <div class="flex items-center w-full p-5 mb-2 rounded-lg shadow bg-base-300 indicator">
                            @if ($index === 0)
                                <span class="indicator-item indicator-center badge badge-accent">Imagem de destaque</span>
                            @endif
                            <div class="flex flex-col py-4 mr-4">
                                <button class="btn btn-ghost btn-circle btn-xs"
                                    wire:click="removeImage({{ $index }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                                <button class="btn btn-ghost btn-circle btn-xs"
                                    x-on:click="document.getElementById('image-{{ $index }}-input').click()">
                                    <svg class="w-4 h-4 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4c0 .6.4 1 1 1h14c.6 0 1-.4 1-1v-4c0-.6-.4-1-1-1h-2M8 9l4-5 4 5m1 8h0" />
                                    </svg>
                                </button>
                            </div>
                            <div id="gallery-items">
                                <div class="pswp-gallery pswp-gallery--single-column">
                                    <a href="{{ $value->temporaryUrl() }}" target="_blank" data-pswp-width="500"
                                        data-pswp-height="657">
                                        <img class="h-24 transition-all ease-in-out rounded cursor-pointer hover:scale-105"
                                            id="image-{{ $index }}" src="{{ $value->temporaryUrl() }}"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <input type="file" id="image-{{ $index }}-input"
                                wire:model="files.{{ $index }}" hidden accept="image/*">

                        </div>
                    @endforeach
                </div>
            @endisset
            <div class="flex flex-col items-center justify-center mt-4">
                <div x-show="uploading">
                    <progress max="100" :value="progress" class="w-56 progress progress-accent"></progress>
                </div>
                <button class="btn btn-outline w-[30vw]" :disabled="uploading"
                    x-on:click="$('#productImages').click()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    adicionar imagens
                </button>
                <input type="file" name="" id="productImages" wire:model="files" x-on:change="progress = 1"
                    hidden multiple accept="image/*">
            </div>
        </div>
        <div class="flex items-center justify-center">
            <button class="ml-6 btn btn-outline btn-sm" x-on:click="currentStep++">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </button>
        </div>
    </div>
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('galleryComponent', () => ({
            uploading: false,
            progress: 0,

            init() {
                const lightbox = new PhotoSwipeLightbox({
                    gallery: '#gallery',
                    children: '#gallery-items',
                    pswpModule: PhotoSwipe,
                    showHideAnimationType: 'fade',
                })

                lightbox.init()
            }
        }))

    })
</script>
