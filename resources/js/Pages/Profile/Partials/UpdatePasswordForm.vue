<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section>
        <header class="mb-6">
            <h2 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Password Security
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                Ensure your account is using a long, random password to stay secure and protect your personal information.
            </p>
        </header>

        <form @submit.prevent="updatePassword" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <InputLabel for="current_password" value="Current Password" class="text-sm font-medium text-gray-700" />

                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <TextInput
                            id="current_password"
                            ref="currentPasswordInput"
                            v-model="form.current_password"
                            type="password"
                            class="pl-10 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-lg"
                            autocomplete="current-password"
                            placeholder="Enter your current password"
                        />
                    </div>

                    <InputError
                        :message="form.errors.current_password"
                        class="mt-2"
                    />
                </div>

                <div>
                    <InputLabel for="password" value="New Password" class="text-sm font-medium text-gray-700" />

                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                        </div>
                        <TextInput
                            id="password"
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="pl-10 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-lg"
                            autocomplete="new-password"
                            placeholder="Enter your new password"
                        />
                    </div>

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>
            </div>

            <div>
                <InputLabel
                    for="password_confirmation"
                    value="Confirm New Password"
                    class="text-sm font-medium text-gray-700"
                />

                <div class="mt-1 relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <TextInput
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        class="pl-10 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-lg"
                        autocomplete="new-password"
                        placeholder="Confirm your new password"
                    />
                </div>

                <InputError
                    :message="form.errors.password_confirmation"
                    class="mt-2"
                />
            </div>

            <!-- Password Requirements -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">
                            Password Requirements
                        </h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <ul class="list-disc list-inside space-y-1">
                                <li>At least 8 characters long</li>
                                <li>Include uppercase and lowercase letters</li>
                                <li>Include at least one number</li>
                                <li>Include at least one special character</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <div class="flex items-center gap-4">
                    <PrimaryButton
                        :disabled="form.processing"
                        class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:ring-green-500 border-0 px-6 py-3 rounded-lg font-medium"
                    >
                        <svg v-if="form.processing" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        {{ form.processing ? 'Updating...' : 'Update Password' }}
                    </PrimaryButton>

                    <Transition
                        enter-active-class="transition ease-in-out duration-300"
                        enter-from-class="opacity-0 transform translate-y-2"
                        enter-to-class="opacity-100 transform translate-y-0"
                        leave-active-class="transition ease-in-out duration-300"
                        leave-from-class="opacity-100 transform translate-y-0"
                        leave-to-class="opacity-0 transform translate-y-2"
                    >
                        <div
                            v-if="form.recentlySuccessful"
                            class="flex items-center gap-2 text-sm text-green-600 bg-green-50 px-3 py-2 rounded-lg border border-green-200"
                        >
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Password updated successfully!
                        </div>
                    </Transition>
                </div>
            </div>
        </form>
    </section>
</template>
