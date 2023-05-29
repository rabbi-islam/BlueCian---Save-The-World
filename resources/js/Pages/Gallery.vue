<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Gallery" />

    <AuthenticatedLayout>
        <div class="pb-12 pt-[110px]">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="flex flex-col items-center">
                        <h2 class="font-bold text-5xl tracking-tight mb-4">
                            Image Gallery
                        </h2>
                    </div>
                    <div class="grid grid-cols-4 gap-4">
                        <img class="h-52 w-full object-cover" src="https://gcaptain.com/wp-content/uploads/2023/05/shutterstock_1946254855-1536x1024.jpg" />
                        <img class="h-52 w-full object-cover" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Air-sea-rescue-falmouth.jpg/800px-Air-sea-rescue-falmouth.jpg" />
                        <img class="h-52 w-full object-cover" src="https://thumbs.dreamstime.com/b/search-rescue-helicopter-royal-navy-sea-king-lifting-casualty-small-boat-busy-shipping-lane-off-northeast-57186538.jpg" />
                        <img class="h-52 w-full object-cover" src="https://upload.wikimedia.org/wikipedia/en/thumb/c/ca/Ship_Ground.jpg/1200px-Ship_Ground.jpg" />
                        <img class="h-52 w-full object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQACpFngzpsfnEhkBWUCdPYRCCojwvhtlb1Yg&usqp=CAU" />
                        <img class="h-52 w-full object-cover" src="https://images.hindustantimes.com/img/2021/04/06/550x309/2021-04-06T133649Z_635210227_RC2DQM9A5ZCQ_RTRMADP_3_NORWAY-SHIP-RESCUE-UGC_1617729020908_1617729027899.jpg" />
                        <img class="h-52 w-full object-cover" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Air-sea-rescue-falmouth.jpg/800px-Air-sea-rescue-falmouth.jpg" />
                        <img class="h-52 w-full object-cover" src="https://thumbs.dreamstime.com/b/search-rescue-helicopter-royal-navy-sea-king-lifting-casualty-small-boat-busy-shipping-lane-off-northeast-57186538.jpg" />
                        <img class="h-52 w-full object-cover" src="https://gcaptain.com/wp-content/uploads/2023/05/shutterstock_1946254855-1536x1024.jpg" />
                        <img class="h-52 w-full object-cover" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Air-sea-rescue-falmouth.jpg/800px-Air-sea-rescue-falmouth.jpg" />
                        <img class="h-52 w-full object-cover" src="https://thumbs.dreamstime.com/b/search-rescue-helicopter-royal-navy-sea-king-lifting-casualty-small-boat-busy-shipping-lane-off-northeast-57186538.jpg" />
                        <img class="h-52 w-full object-cover" src="https://upload.wikimedia.org/wikipedia/en/thumb/c/ca/Ship_Ground.jpg/1200px-Ship_Ground.jpg" />
                        <img class="h-52 w-full object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQACpFngzpsfnEhkBWUCdPYRCCojwvhtlb1Yg&usqp=CAU" />
                        <img class="h-52 w-full object-cover" src="https://images.hindustantimes.com/img/2021/04/06/550x309/2021-04-06T133649Z_635210227_RC2DQM9A5ZCQ_RTRMADP_3_NORWAY-SHIP-RESCUE-UGC_1617729020908_1617729027899.jpg" />
                        <img class="h-52 w-full object-cover" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Air-sea-rescue-falmouth.jpg/800px-Air-sea-rescue-falmouth.jpg" />
                        <img class="h-52 w-full object-cover" src="https://thumbs.dreamstime.com/b/search-rescue-helicopter-royal-navy-sea-king-lifting-casualty-small-boat-busy-shipping-lane-off-northeast-57186538.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
