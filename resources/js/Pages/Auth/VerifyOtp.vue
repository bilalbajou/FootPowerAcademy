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
    <GuestLayout>
        <Head title="Verify Email" />
        <form @submit.prevent="submit" class="mt-8 max-w-md mx-auto">
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
    </GuestLayout>
</template>
