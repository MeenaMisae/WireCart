<div>
    <div class="items-center justify-center hidden lg:flex lg:p-5">
        <h1 class="text-3xl font-light tracking-[0.2rem]">adicionar novo produto</h1>
    </div>
        <div class="flex flex-col items-center justify-center" x-data="{ currentStep: 2 }">
        <ul class="steps steps-horizontal">
            <li :data-content="currentStep > 1 ? '✓' : '1'" class="step step-info">Formulário</li>
            <li :data-content="currentStep > 2 && currentStep <= 3 ? '✓' : '2'" id="imageForm" class="step"
                :class="currentStep > 1 && currentStep <= 3 ? 'step-info' : ''">Fotos</li>
            <li  class="step" :class="currentStep >= 2 && currentStep === 3 ? 'step-info' : ''">
                Revisão
            </li>
        </ul>
        <livewire:admin.products.create.form.admin-create-product-form />
        <livewire:admin.products.create.form.admin-create-product-image-form />
        <livewire:admin.products.create.form.admin-create-product-review-form />
    </div>
</div>
