<script setup lang="ts">
import { ref } from 'vue';
import {
	AlertDialog,
	AlertDialogAction,
	AlertDialogCancel,
	AlertDialogContent,
	AlertDialogDescription,
	AlertDialogFooter,
	AlertDialogHeader,
	AlertDialogTitle,
	AlertDialogTrigger,
} from '@/components/ui/alert-dialog';
import { Link } from '@inertiajs/vue3';

interface Props {
	open: boolean;
	title: string;
	description: string;
}

const props = withDefaults(defineProps<Props>(), {
	description: 'This action cannot be undone.',
});

const isOpen = ref(props.open);

const closeDialog = () => {
	isOpen.value = false;
};
</script>

<template>
	<AlertDialog
		:defaultOpen="true"
		:open="isOpen"
		class="bg-blue-500 text-grass11 font-semibold hover:bg-blue-300 shadow-sm inline-flex h-[35px] items-center justify-center rounded-[4px] px-[15px] leading-none outline-none focus:shadow-[0_0_0_2px] focus:shadow-black transition-all">
		<AlertDialogTrigger>Open</AlertDialogTrigger>

		<AlertDialogContent>
			<AlertDialogHeader>
				<AlertDialogTitle>{{ props.title }}</AlertDialogTitle>
				<AlertDialogDescription>{{ props.description }}</AlertDialogDescription>
			</AlertDialogHeader>

			<AlertDialogFooter>
				<AlertDialogCancel @click="closeDialog">Cancel</AlertDialogCancel>
				<AlertDialogAction>
					<Link :href="route('dashboard')" class="text-indigo-500 hover:text-indigo-600"> Go to Dashboard </Link>
				</AlertDialogAction>
			</AlertDialogFooter>
		</AlertDialogContent>
	</AlertDialog>
</template>
