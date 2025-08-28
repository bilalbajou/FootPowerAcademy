<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    identifier: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Login | FootPower Soccer Academy" />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    />

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
                        FootPower Academy Login
                    </h2>
                </div>

                <!-- Login form -->
                <form @submit.prevent="submit" class="space-y-6">
                    <!-- Identifier (Email or Username) -->
                    <div>
                        <label
                            for="identifier"
                            class="block text-blue-700 font-semibold mb-1"
                            >Email or Username</label
                        >
                        <div class="text-xs text-blue-600 mb-1">You can login using your email address or username.</div>
                        <input
                            id="identifier"
                            type="text"
                            v-model="form.identifier"
                            required
                            autofocus
                            autocomplete="username"
                            class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 bg-blue-50 text-blue-900 placeholder-blue-400"
                            placeholder="Enter your email or username"
                        />
                        <div
                            v-if="form.errors.identifier"
                            class="text-red-500 text-xs mt-1"
                        >
                            {{ form.errors.identifier }}
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label
                            for="password"
                            class="block text-blue-700 font-semibold mb-1"
                            >Password</label
                        >
                        <input
                            id="password"
                            type="password"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                            class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 bg-blue-50 text-blue-900 placeholder-blue-400"
                            placeholder="Password"
                        />
                        <div
                            v-if="form.errors.password"
                            class="text-red-500 text-xs mt-1"
                        >
                            {{ form.errors.password }}
                        </div>
                    </div>

                    <!-- Remember me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label
                            class="flex items-center space-x-2 text-blue-700"
                        >
                            <input
                                type="checkbox"
                                v-model="form.remember"
                                class="rounded border-blue-300 text-blue-600 shadow-sm focus:ring-blue-500"
                            />
                            <span class="text-sm">Remember me</span>
                        </label>

                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                            >Forgot Password?</Link
                        >
                    </div>

                    <!-- Submit button -->
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-200 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center justify-center"
                    >
                        <span
                            v-if="form.processing"
                            class="inline-flex items-center"
                        >
                            <svg
                                class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <circle
                                    class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"
                                ></circle>
                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                ></path>
                            </svg>
                            Logging in...
                        </span>
                        <span v-else>Login</span>
                    </button>

                    <!-- Register link -->
                    <div
                        class="flex items-center justify-between mt-6 pt-4 border-t border-blue-100"
                    >
                        <span class="text-sm text-blue-700"
                            >Don't have an Account?</span
                        >
                        <Link
                            :href="route('register')"
                            class="text-sm text-blue-700 hover:text-blue-900 font-medium"
                            >Create Account</Link
                        >
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Custom animations */
@keyframes floating {
    0%,
    100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

.auth-bg span:nth-child(1) {
    animation: floating 7s ease-in-out infinite;
}

.auth-bg span:nth-child(2) {
    animation: floating 9s ease-in-out infinite;
}

.auth-bg span:nth-child(3) {
    animation: floating 7s ease-in-out infinite;
}

.auth-bg span:nth-child(4) {
    animation: floating 9s ease-in-out infinite;
}

/* Form focus states */
input:focus {
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

/* Button hover effects */
button:hover:not(:disabled) {
    transform: translateY(-1px);
}
</style>
