<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    faqs: {
        type: Object,
        required: true,
    },
});

</script>

<template>
    <Head title="FAQ" />

    <AuthenticatedLayout>
        <div class="pb-12 pt-[110px]">
          	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="max-w-screen-xl mx-auto px-5 bg-white min-h-sceen">
					<div class="flex flex-col items-center">
						<h2 class="font-bold text-5xl mt-5 tracking-tight">
							FAQ
						</h2>
						<p class="text-neutral-500 text-xl mt-3">
							Frequenty asked questions
						</p>
					</div>
					<div class="grid divide-y divide-neutral-200 max-w-xl mx-auto mt-8">
						<div v-for="faq in faqs" :key="faq.id" class="py-5">
							<details class="group">
								<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
									<span> {{faq.question}}</span>
									<span class="transition group-open:rotate-180">
								<svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
								</svg>
							</span>
								</summary>
								<p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
									{{faq.answer}}
								</p>
							</details>
						</div>
					</div>
				</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
