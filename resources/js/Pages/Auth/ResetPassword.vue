<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Reset Password | FootPower Soccer Academy" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <div class="min-h-screen flex items-center justify-center bg-blue-50" style="background: url('/assets/images/background_academy.jpg') center center / cover no-repeat;">
        <div class="w-full max-w-md">
            <div class="bg-white/80 rounded-2xl shadow-md px-8 py-10 border border-blue-100" style="background:rgba(255,255,255,0.8);">
                <h2 class="text-xl font-bold text-blue-800 mb-4 text-center">Reset your password</h2>
                <form @submit.prevent="submit" class="space-y-6">
                    <div>
                        <label for="email" class="block text-blue-700 font-semibold mb-1">Email</label>
                        <input id="email" type="email" v-model="form.email" required autofocus autocomplete="username"
                            class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 bg-blue-50 text-blue-900 placeholder-blue-400"
                            placeholder="Enter your email" />
                        <div v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</div>
                    </div>
                    <div>
                        <label for="password" class="block text-blue-700 font-semibold mb-1">Password</label>
                        <input id="password" type="password" v-model="form.password" required autocomplete="new-password"
                            class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 bg-blue-50 text-blue-900 placeholder-blue-400"
                            placeholder="Enter new password" />
                        <div v-if="form.errors.password" class="text-red-500 text-xs mt-1">{{ form.errors.password }}</div>
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-blue-700 font-semibold mb-1">Confirm Password</label>
                        <input id="password_confirmation" type="password" v-model="form.password_confirmation" required autocomplete="new-password"
                            class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 bg-blue-50 text-blue-900 placeholder-blue-400"
                            placeholder="Confirm new password" />
                        <div v-if="form.errors.password_confirmation" class="text-red-500 text-xs mt-1">{{ form.errors.password_confirmation }}</div>
                    </div>
                    <button type="submit" :disabled="form.processing"
                        class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-200 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center justify-center">
                        <span v-if="form.processing" class="inline-flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Changing password...
                        </span>
                        <span v-else>Reset Password</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
