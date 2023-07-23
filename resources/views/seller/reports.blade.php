<x-admin-layout>
    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-10 xl:max-w-7xl">
        <section class="space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-red-600">
                    SALES GRAPH
                </h2>
                <x-button label="view sales" wire:click="$set('sale_modal', true)" negative rounded
                    right-icon="arrow-right" />
            </div>
            <div class="mt-2">
                <livewire:admin.charts />
            </div>

        </section>
    </div>
</x-admin-layout>
