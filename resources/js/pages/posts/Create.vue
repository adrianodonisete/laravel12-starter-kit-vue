<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import PlaceholderPattern from '../../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
	{
		title: 'Create Post',
		href: '/posts',
	},
];

const form = useForm({
	title: '',
	content: '',
	image: null,
});

const submit = () => {
	form.post(route('posts.store'));
};
</script>

<template>
	<Head title="Create Post" />

	<AppLayout :breadcrumbs="breadcrumbs">
		<div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
			<div
				class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
				<form @submit.prevent="submit" class="flex flex-col gap-6">
					<div class="grid gap-6">
						<div class="grid gap-2">
							<Label for="email">Email address</Label>
							<Input
								id="email"
								type="email"
								required
								autofocus
								:tabindex="1"
								autocomplete="email"
								v-model="form.email"
								placeholder="email@example.com" />
							<InputError :message="form.errors.email" />
						</div>

						<div class="grid gap-2">
							<div class="flex items-center justify-between">
								<Label for="password">Password</Label>
								<TextLink v-if="canResetPassword" :href="route('password.request')" class="text-sm" :tabindex="5">
									Forgot password?
								</TextLink>
							</div>
							<Input
								id="password"
								type="password"
								required
								:tabindex="2"
								autocomplete="current-password"
								v-model="form.password"
								placeholder="Password" />
							<InputError :message="form.errors.password" />
						</div>

						<div class="flex items-center justify-between" :tabindex="3">
							<Label for="remember" class="flex items-center space-x-3">
								<Checkbox id="remember" v-model:checked="form.remember" :tabindex="4" />
								<span>Remember me</span>
							</Label>
						</div>

						<Button type="submit" class="mt-4 w-full" :tabindex="4" :disabled="form.processing">
							<LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
							Log in
						</Button>
					</div>

					<div class="text-center text-sm text-muted-foreground">
						Don't have an account?
						<TextLink :href="route('register')" :tabindex="5">Sign up</TextLink>
					</div>
				</form>
			</div>
		</div>
	</AppLayout>
</template>
