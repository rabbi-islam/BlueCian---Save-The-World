<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';

defineProps({
    rescues: {
        type: Object,
        required: true,
    },
    cr: {
        type: Number,
        required: true,
    },
    pr: {
        type: Number,
        required: true,
    },
});

onMounted(() => {
    const polyfillscript = document.createElement("script")
    polyfillscript.setAttribute("src", "https://polyfill.io/v3/polyfill.min.js?features=default");
    document.head.appendChild(polyfillscript);

    const mapsscript = document.createElement("script")
    mapsscript.setAttribute("src", "https://maps.googleapis.com/maps/api/js?key=&callback=initMap&v=weekly");
    mapsscript.setAttribute("defer", "");
    mapsscript.setAttribute("async", "");
    document.head.appendChild(mapsscript);
});
window.initMap = () => {
    const center = { lat: -34.397, lng: 150.644 };
    const map = new window.google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: center,
    });
    const marker = new window.google.maps.Marker({
        position: center,
        map: map,
    });
};

const form = useForm({
    id: '',
    location: '',
    vehicle: '',
});

const status = (id) => {
    form.id = id;
    form.put(route('rescue.status'), {
        preserveScroll: true,
    });
};

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
          <div class="flex justify-between items-center pt-[64px]">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
            <div class="w-36">
              <select id="number" class="block w-full px-3 py-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                <option value="">Last 30 days</option>
                <option value="">Last 2 weeks</option>
                <option value="">Last 7 days</option>
              </select>
            </div>
          </div>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="overflow-hidden p-4 bg-white">
                <div class="flex justify-between">
                    <p>Sales Dashboard Overview</p>
                    <p>Add Info <span class="px-8">|</span> Get update by email <span class="px-8">|</span> See more</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="overflow-hidden">
                <div class="grid grid-cols-2 gap-24">
                    <div class="p-4 bg-white">
                        <p>Rescue Request Analytices</p>
                        <div class="mt-2 flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12l-3-3m0 0l-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <div>
                                Completed Rescue Request
                                <div class="flex gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                    </svg>
                                    <span>{{cr}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 flex justify-start items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12l-3-3m0 0l-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <div>
                                Pending Rescue Request
                                <div class="flex gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                    <span>{{pr}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-4 bg-white">
                        <p>Today Earnings</p>
                        <div class="mt-2 flex justify-between items-center gap-2">
                            <div>
                                <h1 class="text-xl font-semibold">$2850</h1>
                                <p class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -rotate-45 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>Avg. Sales Per Day</p>
                            </div>
                            <div class="flex gap-2 rotate-180">
                                <div class="w-6 h-20 bg-gray-300"></div>
                                <div class="w-6 h-14 bg-gray-700"></div>
                                <div class="w-6 h-16 bg-gray-700"></div>
                                <div class="w-6 h-24 bg-gray-700"></div>
                                <div class="w-6 h-10 bg-gray-700"></div>
                                <div class="w-6 h-12 bg-gray-700"></div>
                                <div class="w-6 h-8 bg-gray-700"></div>
                            </div>
                        </div>
                        <div class="mt-2 flex justify-between items-center gap-2">
                            <div>
                                <p>Total Income</p>
                                <h1 class="text-xl font-semibold mt-2">$2850</h1>
                                <p class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg><span class="text-green-500">+43.54%</span> Last week</p>
                            </div>
                            <div>
                                <p>Total Expenses</p>
                                <h1 class="text-xl font-semibold mt-2">$54345</h1>
                                <p class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg><span class="text-green-500">+0.7%</span> Last month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="overflow-hidden">
                <div class="p-4 bg-white">
                    <p>Location</p>
                </div>
                <div id="map" class="w-full h-72"></div>
            </div>
        </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-12">
                <div class="overflow-hidden">
                    <div class="p-4 flex justify-between items-center bg-white">
                        <p class="mt-1">Rescue Request Log</p>
                        <button class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600"><span>Generate Report</span></button>
                    </div>
                     <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>Request</span>
                                    </button>
                                </th>

                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Order ID
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Date
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Address</th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Status</th>

                                <th v-if="$page.props.auth.user.type" scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            <tr v-for="rescue in rescues" :key="rescue.id">
                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                    <div>
                                        <p class="text-sm font-normal text-gray-600 dark:text-gray-400">{{rescue.title}}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="px-4 py-4 text-sm whitespace-nowrap">
                                        <p class="text-gray-500 dark:text-gray-400">#{{rescue.order_id}}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div>
                                        <p class="text-gray-500 dark:text-gray-400">{{rescue.human_created_at}}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div>
                                        <p class="text-gray-500 dark:text-gray-400">{{rescue.location}}</p>
                                    </div>
                                </td>

                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div v-if="rescue.status" class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                        Completed
                                    </div>
                                    <div v-else class="inline px-3 py-1 text-sm font-normal rounded-full text-yellow-500 gap-x-2 bg-yellow-100/60 dark:bg-gray-800">
                                        Pending
                                    </div>
                                </td>

                                <td v-if="$page.props.auth.user.type" class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="flex justify-between items-center">
                                        <p class="p-2 bg-gray-300 rounded"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg></p>
                                        <p class="p-2 bg-gray-300 rounded"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v8.25A2.25 2.25 0 006 16.5h2.25m8.25-8.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-7.5A2.25 2.25 0 018.25 18v-1.5m8.25-8.25h-6a2.25 2.25 0 00-2.25 2.25v6" />
                                        </svg></p>
                                        <button type="button" @click="status(rescue.id)" class="p-2 bg-gray-300 rounded"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v8.25A2.25 2.25 0 006 16.5h2.25m8.25-8.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-7.5A2.25 2.25 0 018.25 18v-1.5m8.25-8.25h-6a2.25 2.25 0 00-2.25 2.25v6" />
                                        </svg></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </AuthenticatedLayout>
</template>
