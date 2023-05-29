<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    rescues: {
        type: Object,
        required: true,
    },
    vehicles: {
        type: Object,
        required: true,
    },
});

const confirmingRescueSubmitted = ref(false);

const form = useForm({
    title: '',
    location: '',
    vehicle: '',
});

const confirmRescueSubmitted = () => {
    confirmingRescueSubmitted.value = true;
};

const newRescue = () => {
    form.post(route('rescue.new'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingRescueSubmitted.value = false;

    form.reset();
};

</script>

<template>
    <Head title="Rescue Request" />

    <AuthenticatedLayout>
        <div class="pb-12 pt-[110px]">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="flex justify-between mb-2 bg-white p-4">
                        <p>Rescue Request</p>
                        <button @click="confirmRescueSubmitted" type="button" class="inline-flex items-center py-1 px-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>New Rescue Request</button>
                    </div>
                    <div class="grid grid-cols-4 gap-8">
                        <div class="flex justify-between items-center">
                            <div class="flex justify-between items-center gap-2">
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                                <p>New 2</p>
                            </div>
                            <div class="flex justify-between items-center gap-2">
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex justify-between items-center gap-2">
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                                <p>In progress 11</p>
                            </div>
                            <div class="flex justify-between items-center gap-2">
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex justify-between items-center gap-2">
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                                <p>Awaiting 3</p>
                            </div>
                            <div class="flex justify-between items-center gap-2">
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex justify-between items-center gap-2">
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                                <p>Done 33</p>
                            </div>
                            <div class="flex justify-between items-center gap-2">
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                                <div class="w-2 h-2 bg-gray-800 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                     <div class="grid grid-cols-4 gap-8 mt-4">
                        <div v-for="rescue in rescues" :key="rescue.id" class="bg-white p-2">
                            <p>{{rescue.title}}</p>
                        <div class="flex justify-start items-center gap-2 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                            </svg>
                            <p>${{rescue.vehicle.price}}</p>
                        </div>
                        <div class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p>{{rescue.human_created_at}}</p>
                        </div>
                        <div class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <p>{{rescue.user.name}}</p>
                        </div>
                        <div class="flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <p>{{rescue.location}}</p>
                        </div>
                        </div>
                    </div>
                </div>

                <Modal :show="confirmingRescueSubmitted" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you want to create new rescue request?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    By sending this rescue request, you will get connected with us and apply for a new rescue operation.
                </p>

                <div class="mt-4">
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autocomplete="title"
                />

                <InputError class="mt-2" :message="form.errors.title" />
                </div>

                <div class="mt-4">
                <InputLabel for="location" value="Location" />

                <TextInput
                    id="location"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.location"
                    required
                    autocomplete="location"
                />

                <InputError class="mt-2" :message="form.errors.location" />
                </div>

                <div class="mt-4">
                <InputLabel for="vehicle" value="Vehicle" />

                <select id="type" v-model="form.vehicle" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    <option v-for="vehicle in vehicles" :key="vehicle.id" :value="vehicle.id">{{vehicle.title}} - ${{vehicle.price}}</option>
                </select>

                <InputError class="mt-2" :message="form.errors.vehicle" />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <PrimaryButton @click="newRescue" class="ml-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Submit</PrimaryButton>
                </div>
            </div>
        </Modal>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
