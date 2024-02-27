<div>
    <div class="lg:flex justify-center items-center hidden lg:p-5">
        <h1 class="text-3xl font-light tracking-[0.2rem]">adicionar novo produto</h1>
    </div>
    <div class="flex flex-col justify-center items-center" x-data="{ currentStep: 2 }">
        <ul class="steps steps-horizontal">
            <li class="step step-info">Formulário</li>
            <li class="step" :class="currentStep > 1 && currentStep <= 3 ?  'step-info' : '' ">Fotos</li>
            <li class="step" :class="currentStep >= 2 && currentStep === 3  ? 'step-info' : '' ">Revisão</li>
        </ul>
            <livewire:admin.products.create.form.admin-create-product-form />
            <livewire:admin.products.create.form.admin-create-product-image-form />
            <livewire:admin.products.create.form.admin-create-product-review-form />
    </div>
</div>
