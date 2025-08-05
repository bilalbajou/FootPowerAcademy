<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    userId: Number,
});

const form = useForm({
    otp: '',
});

const submit = () => {
    form.post(route('verification.otp.submit', { user: props.userId }), {
        onFinish: () => form.reset('otp'),
    });
};
</script>

<template>
    <Head title="Verify OTP | FootPower Soccer Academy" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <div class="min-h-screen flex items-center justify-center bg-blue-50" style="background: url('/assets/images/background_academy.jpg') center center / cover no-repeat;">
        <div class="w-full max-w-md">
            <div class="bg-white/80 rounded-2xl shadow-md px-8 py-10 border border-blue-100" style="background:rgba(255,255,255,0.8);">
                <div class="flex flex-col items-center mb-8">
                    <img
                        src="/assets/images/footpoweracademy-removebg.png"
                        alt="FootPower Academy Logo"
                        style="height: 160px; width: 160px; object-fit: contain;"
                        class="mb-4"
                    />
                    <h2 class="text-xl font-bold text-blue-800 mb-2">
                        Verify Your Email
                    </h2>
                </div>
                <form @submit.prevent="submit" class="space-y-6">
                    <div>
                        <InputLabel for="otp" value="Enter the OTP sent to your email" />
                        <TextInput
                            id="otp"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.otp"
                            maxlength="6"
                            required
                            autofocus
                        />
                        <InputError class="mt-2" :message="form.errors.otp" />
                    </div>
                    <div class="mt-4">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Verify
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
