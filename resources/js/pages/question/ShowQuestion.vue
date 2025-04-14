<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';
import AlertConfirm from '@/components/AlertConfirm.vue';
import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
	{
		title: 'Questions',
		href: '/questions/show',
	},
];

const idPost = ref<number>(16);
</script>

<template>
	<Head title="Question Details" />

	<AppLayout :breadcrumbs="breadcrumbs">
		<div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
			<div class="min-w-md mx-auto p-6 mt-8 bg-white dark:bg-gray-800 shadow-lg rounded-xl">
				<div class="grid gap-2">
					<AlertConfirm
						:route-confirm="route('posts.destroy', idPost)"
						textButton="Delete with confirmation"
						:question="`Do you want to delete the post ID#${idPost}?`"
						description="This action cannot be undone. This will permanently delete the post." />
				</div>
			</div>
		</div>
	</AppLayout>
</template>
