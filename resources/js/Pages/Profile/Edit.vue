<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile - FootPower Academy" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-700 rounded-lg shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        Profile Settings
                    </h2>
                    <p class="text-sm text-gray-600">
                        Manage your account information and preferences
                    </p>
                </div>
            </div>
        </template>

        <div class="py-8">
            <div class="mx-auto max-w-4xl space-y-8">
                <!-- Profile Information Card -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profile Information
                        </h3>
                    </div>
                    <div class="p-6">
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                            class="max-w-2xl"
                        />
                    </div>
                </div>

                <!-- Password Update Card -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Security Settings
                        </h3>
                    </div>
                    <div class="p-6">
                        <UpdatePasswordForm class="max-w-2xl" />
                    </div>
                </div>

                <!-- Account Deletion Card -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Danger Zone
                        </h3>
                    </div>
                    <div class="p-6">
                        <DeleteUserForm class="max-w-2xl" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
