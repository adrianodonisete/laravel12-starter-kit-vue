import type { PageProps } from '@inertiajs/core';
import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';

export interface Auth {
	user: User;
}

export interface BreadcrumbItem {
	title: string;
	href: string;
}

export interface NavItem {
	title: string;
	href: string;
	icon?: LucideIcon;
	isActive?: boolean;
}

export interface SharedData extends PageProps {
	name: string;
	quote: { message: string; author: string };
	auth: Auth;
	ziggy: Config & { location: string };
}

export interface User {
	id: number;
	name: string;
	email: string;
	avatar?: string;
	email_verified_at: string | null;
	created_at: string;
	updated_at: string;
}

interface Flash {
	success?: null;
	error?: null;
}

export type BreadcrumbItemType = BreadcrumbItem;

export type PostForm = {
	title: string;
	content: string;
	image: File | null;
	_method?: string;
};

export type Post = {
	id: number;
	title: string;
	content: string;
	image: string;
	slug: string;
};
