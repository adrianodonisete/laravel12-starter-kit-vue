<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {
	AlertDialogAction,
	AlertDialogCancel,
	AlertDialogContent,
	AlertDialogDescription,
	AlertDialogOverlay,
	AlertDialogPortal,
	AlertDialogRoot,
	AlertDialogTitle,
	AlertDialogTrigger,
} from 'radix-vue';

interface Props {
	routeConfirm: string;
	textButton: string;
	question: string;
	description?: string;
	textButtonConfirm?: string;
	textButtonCancel?: string;
}

const props = withDefaults(defineProps<Props>(), {
	description: 'This action cannot be undone.',
	textButtonConfirm: 'Yes, confirm',
	textButtonCancel: 'Cancel',
});
</script>

<template>
	<AlertDialogRoot>
		<AlertDialogTrigger class="text-red-500 hover:text-red-600"> {{ props.textButton }} </AlertDialogTrigger>

		<AlertDialogPortal>
			<AlertDialogOverlay class="bg-blackA9 data-[state=open]:animate-overlayShow fixed inset-0 z-30" />
			<AlertDialogContent
				class="z-[100] text-[15px] data-[state=open]:animate-contentShow fixed top-[50%] left-[50%] max-h-[85vh] w-[90vw] max-w-[500px] translate-x-[-50%] translate-y-[-50%] rounded-[6px] bg-gray-400 p-[25px] shadow-[hsl(206_22%_7%_/_35%)_0px_10px_38px_-10px,_hsl(206_22%_7%_/_20%)_0px_10px_20px_-15px] focus:outline-none">
				<AlertDialogTitle class="text-mauve12 m-0 text-[17px] font-semibold">
					{{ props.question }}
				</AlertDialogTitle>

				<AlertDialogDescription class="text-mauve11 mt-4 mb-5 text-[15px] leading-normal">
					{{ props.description }}
				</AlertDialogDescription>

				<div class="flex justify-end gap-[25px]">
					<AlertDialogCancel
						class="text-mauve11 bg-mauve4 hover:bg-mauve5 focus:shadow-mauve7 inline-flex h-[35px] items-center justify-center rounded-[4px] px-[15px] font-semibold leading-none outline-none focus:shadow-[0_0_0_2px]">
						{{ props.textButtonCancel }}
					</AlertDialogCancel>

					<AlertDialogAction
						class="text-red11 bg-red4 hover:bg-red5 focus:shadow-red7 inline-flex h-[35px] items-center justify-center rounded-[4px] px-[15px] font-semibold leading-none outline-none focus:shadow-[0_0_0_2px]">
						<Link :href="props.routeConfirm" class="text-red-500 hover:text-red-600" method="delete" as="button">
							{{ props.textButtonConfirm }}
						</Link>
					</AlertDialogAction>
				</div>
			</AlertDialogContent>
		</AlertDialogPortal>
	</AlertDialogRoot>
</template>
