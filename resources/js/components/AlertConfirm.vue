<script setup lang="ts">
import { watch, ref } from 'vue';
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
	<AlertDialog :open="isOpen">
		<AlertDialogTrigger>Open</AlertDialogTrigger>
		<AlertDialogContent>
			<AlertDialogHeader>
				<AlertDialogTitle>{{ props.title }}</AlertDialogTitle>
				<AlertDialogDescription>{{ props.description }}</AlertDialogDescription>
			</AlertDialogHeader>

			<AlertDialogFooter>
				<AlertDialogCancel @click="closeDialog">Cancel</AlertDialogCancel>
				<AlertDialogAction>Continue</AlertDialogAction>
			</AlertDialogFooter>
		</AlertDialogContent>
	</AlertDialog>
</template>
