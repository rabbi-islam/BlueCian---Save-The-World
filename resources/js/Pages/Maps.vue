<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Maps" />

    <AuthenticatedLayout>
        <div class="pb-12 pt-[110px]">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <img class="h-full w-full object-cover" src="/images/maps.png" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
