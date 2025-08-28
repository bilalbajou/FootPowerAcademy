<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.clearErrors();
    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header class="mb-6">
            <h2 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Account Deletion
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                Once your account is deleted, all of its resources and data will be permanently deleted.
                This action cannot be undone. Please download any data or information that you wish to retain before proceeding.
            </p>
        </header>

        <!-- Warning Alert -->
        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">
                        Irreversible Action
                    </h3>
                    <div class="mt-2 text-sm text-red-700">
                        <p>Deleting your account will permanently remove all your data, including:</p>
                        <ul class="list-disc list-inside mt-1 space-y-1">
                            <li>Personal information and profile data</li>
                            <li>Account settings and preferences</li>
                            <li>All associated records and history</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <DangerButton
                @click="confirmUserDeletion"
                class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 focus:ring-red-500 border-0 px-6 py-3 rounded-lg font-medium"
            >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Delete Account
            </DangerButton>
        </div>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-full">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">
                            Confirm Account Deletion
                        </h2>
                        <p class="text-sm text-gray-600">
                            This action cannot be undone
                        </p>
                    </div>
                </div>

                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700">
                                Once your account is deleted, all of its resources and data will be permanently deleted.
                                Please enter your password to confirm you would like to permanently delete your account.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <InputLabel
                            for="password"
                            value="Password"
                            class="text-sm font-medium text-gray-700"
                        />

                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <TextInput
                                id="password"
                                ref="passwordInput"
                                v-model="form.password"
                                type="password"
                                class="pl-10 block w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-lg"
                                placeholder="Enter your password to confirm"
                                @keyup.enter="deleteUser"
                            />
                        </div>

                        <InputError :message="form.errors.password" class="mt-2" />
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <SecondaryButton
                        @click="closeModal"
                        class="px-6 py-3 rounded-lg font-medium border-gray-300 text-gray-700 hover:bg-gray-50"
                    >
                        Cancel
                    </SecondaryButton>

                    <DangerButton
                        :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                        class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 focus:ring-red-500 border-0 px-6 py-3 rounded-lg font-medium"
                    >
                        <svg v-if="form.processing" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        {{ form.processing ? 'Deleting...' : 'Delete Account' }}
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
