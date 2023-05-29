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
    vehicles: {
        type: Object,
        required: true,
    },
});

const confirmingVehicleSubmitted = ref(false);

const form = useForm({
    title: '',
    desc: '',
    price: '',
    img: '',
});

const confirmVehicleSubmitted = () => {
    confirmingVehicleSubmitted.value = true;
};

const newVehicle = () => {
    form.post(route('vehicle.new'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingVehicleSubmitted.value = false;

    form.reset();
};


</script>

<template>
    <Head title="Vehicles List" />

    <AuthenticatedLayout>
        <div class="pb-12 pt-[110px]">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between mb-2 bg-white p-4">
                        <p>Ship Rescue Vehicles List</p>
                        <button v-if="$page.props.auth.user.type" @click="confirmVehicleSubmitted" type="button" class="inline-flex items-center py-1 px-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>New Vehicle</button>
                    </div>
                <div v-for="vehicle in vehicles" :key="vehicle.id" class="container mt-4 p-2 mx-auto bg-white">
                    <div class="lg:-mx-6 lg:flex lg:items-center">
                        <img class="object-cover w-full lg:mx-6 lg:w-1/3 rounded-xl h-72 lg:h-64" :src="vehicle.img" :alt="vehicle.title">

                        <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                            <h1 class="block mt-4 text-2xl font-semibold text-gray-800 dark:text-white md:text-3xl">
                                {{vehicle.title}}
                            </h1>

                            <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                                {{vehicle.desc}}
                            </p>

                            <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                                ${{vehicle.price}}
                            </p>
                        </div>
                    </div>
                </div>
                </div>
                <Modal :show="confirmingVehicleSubmitted" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you want to create new vehicle?
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
                <InputLabel for="price" value="Price" />

                <TextInput
                    id="price"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.price"
                    required
                    autocomplete="price"
                />

                <InputError class="mt-2" :message="form.errors.price" />
                </div>

                <div class="mt-4">
                <InputLabel for="img" value="Image" />

                <TextInput
                    id="img"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.img"
                    required
                    autocomplete="img"
                />

                <InputError class="mt-2" :message="form.errors.img" />
                </div>

                <div class="mt-4">
                <InputLabel for="desc" value="Desc" />

                <TextInput
                    id="desc"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.desc"
                    required
                    autocomplete="desc"
                />

                <InputError class="mt-2" :message="form.errors.desc" />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <PrimaryButton @click="newVehicle" class="ml-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Submit</PrimaryButton>
                </div>
            </div>
        </Modal>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
