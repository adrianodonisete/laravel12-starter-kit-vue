<script setup lang="ts">
import { ref } from 'vue';
import AlertConfirm from '@/components/AlertConfirm.vue';
import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
	{
		title: 'Questions',
		href: '/questions/show',
	},
];

const showAlert = ref(false);

const openAlert = () => {
	showAlert.value = true;
};
</script>

<template>
	<Head title="Question Details" />

	<AppLayout :breadcrumbs="breadcrumbs">
		<div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
			<div class="min-w-md mx-auto p-6 mt-8 bg-white dark:bg-gray-800 shadow-lg rounded-xl">
				<div class="grid gap-2">
					<Button
						type="button"
						:tabindex="1"
						class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
						@click="openAlert">
						Open Alert
					</Button>

					<AlertConfirm
						:open="showAlert"
						title="Do you want to delete the Post ID#12?"
						description="This action cannot be undone. This will permanently delete the post." />
				</div>
			</div>
		</div>
	</AppLayout>
</template>
