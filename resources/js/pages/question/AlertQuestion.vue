<script setup lang="ts">
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

function handleAction() {
	alert('clicked action button!');
}

// https://www.radix-vue.com/components/alert-dialog
</script>

<template>
	<AlertDialogRoot>
		<AlertDialogTrigger
			class="bg-blue-500 text-grass11 font-semibold hover:bg-blue-300 shadow-sm inline-flex h-[35px] items-center justify-center rounded-[4px] px-[15px] leading-none outline-none focus:shadow-[0_0_0_2px] focus:shadow-black transition-all">
			Delete account
		</AlertDialogTrigger>

		<AlertDialogPortal>
			<AlertDialogOverlay class="bg-blackA9 data-[state=open]:animate-overlayShow fixed inset-0 z-30" />
			<AlertDialogContent
				class="z-[100] text-[15px] data-[state=open]:animate-contentShow fixed top-[50%] left-[50%] max-h-[85vh] w-[90vw] max-w-[500px] translate-x-[-50%] translate-y-[-50%] rounded-[6px] bg-gray-400 p-[25px] shadow-[hsl(206_22%_7%_/_35%)_0px_10px_38px_-10px,_hsl(206_22%_7%_/_20%)_0px_10px_20px_-15px] focus:outline-none">
				<AlertDialogTitle class="text-mauve12 m-0 text-[17px] font-semibold">
					Are you absolutely sure?
				</AlertDialogTitle>
				<AlertDialogDescription class="text-mauve11 mt-4 mb-5 text-[15px] leading-normal">
					This action cannot be undone. This will permanently delete your account and remove your data from our servers.
				</AlertDialogDescription>

				<div class="flex justify-end gap-[25px]">
					<AlertDialogCancel
						class="text-mauve11 bg-mauve4 hover:bg-mauve5 focus:shadow-mauve7 inline-flex h-[35px] items-center justify-center rounded-[4px] px-[15px] font-semibold leading-none outline-none focus:shadow-[0_0_0_2px]">
						Cancel
					</AlertDialogCancel>
					<AlertDialogAction
						class="text-red11 bg-red4 hover:bg-red5 focus:shadow-red7 inline-flex h-[35px] items-center justify-center rounded-[4px] px-[15px] font-semibold leading-none outline-none focus:shadow-[0_0_0_2px]"
						@click="handleAction">
						Yes, delete account
					</AlertDialogAction>
				</div>
			</AlertDialogContent>
		</AlertDialogPortal>
	</AlertDialogRoot>
</template>
