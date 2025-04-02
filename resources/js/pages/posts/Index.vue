<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Flash, Post, type BreadcrumbItem } from '@/types';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import { onMounted, watch } from 'vue';
import { toast } from 'vue-sonner';
import AlertConfirm from '@/components/AlertConfirm.vue';

const breadcrumbs: BreadcrumbItem[] = [
	{
		title: 'Posts',
		href: '/posts',
	},
];

defineProps<{ posts: Post[] }>();

onMounted(() => {
	watch(
		() => usePage<{ flash: Flash }>().props.flash,
		(flash: Flash) => {
			if (flash.success) {
				toast.success(flash.success);
				flash.success = null;
			}
		},
		{ immediate: true }
	);
});
</script>

<template>
	<Head title="Posts" />

	<AppLayout :breadcrumbs="breadcrumbs">
		<div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
			<div class="flex justify-end">
				<Link href="/posts/create" class="text-indigo-500 hover:text-indigo-600">Create Post</Link>
			</div>

			<div
				class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
				<Table>
					<TableCaption>A list of your recent posts.</TableCaption>

					<TableHeader>
						<TableRow>
							<TableHead class="w-[100px]"> Id </TableHead>
							<TableHead> Title </TableHead>
							<TableHead> Image </TableHead>
							<TableHead class="text-right"> Actions </TableHead>
						</TableRow>
					</TableHeader>

					<TableBody v-for="post in posts" :key="post.id">
						<TableRow>
							<TableCell class="font-medium"> {{ post.id }} </TableCell>
							<TableCell> {{ post.title }} </TableCell>
							<TableCell>
								<img :src="post.image" alt="" class="h-12 w-12 rounded object-cover" />
							</TableCell>
							<TableCell class="flex justify-end gap-2">
								<Link :href="route('posts.edit', post.id)" class="text-indigo-500 hover:text-indigo-600">Edit</Link>
								<Link
									:href="route('posts.destroy', post.id)"
									class="text-red-500 hover:text-red-600"
									method="delete"
									as="button">
									Delete
								</Link>
							</TableCell>
						</TableRow>
					</TableBody>
				</Table>
			</div>
		</div>
	</AppLayout>

	<!-- https://www.shadcn-vue.com/docs/components/alert-dialog.html -->
	<AlertConfirm :defaultOpen="true" :open="true" :title="`Do you wanto to delete Post ID#12?`" />
</template>
