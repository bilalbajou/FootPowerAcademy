<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    _method: "POST",
    name: user.name,
    email: user.email,
    profile_photo: null,
});

const updateProfilePhoto = (event) => {
    form.profile_photo = event.target.files[0];

    // Preview the new image
    const reader = new FileReader();
    reader.onload = (e) => {
        document.getElementById("profile-photo-preview").src = e.target.result;
    };
    reader.readAsDataURL(form.profile_photo);
};
</script>

<template>
    <section>
        <header class="mb-6">
            <h2
                class="text-xl font-semibold text-gray-900 flex items-center gap-2"
            >
                <svg
                    class="w-5 h-5 text-blue-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    />
                </svg>
                Personal Information
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                Update your account's profile information and email address to
                keep your account secure and up to date.
            </p>
        </header>

        <form
            @submit.prevent="
                form.post(route('profile.update'), {
                    preserveScroll: true,
                    onSuccess: () => form.reset('profile_photo'),
                    forceFormData: true,
                })
            "
            class="space-y-6"
            enctype="multipart/form-data"
        >
            <!-- Profile Photo Upload -->
            <div class="col-span-full mb-6">
                <InputLabel
                    value="Profile Photo"
                    class="text-sm font-medium text-gray-700 mb-2"
                />
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <img
                            :src="
                                user.profile_photo_url ||
                                'https://www.aast.org/Images/profile-icon.png'
                            "
                            id="profile-photo-preview"
                            class="h-20 w-20 rounded-full object-cover border-2 border-gray-200"
                            alt="Profile photo"
                        />
                    </div>
                    <div class="flex-1">
                        <label
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-medium text-sm text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 cursor-pointer"
                        >
                            <svg
                                class="-ml-1 mr-2 h-5 w-5 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />
                            </svg>
                            <span>{{
                                form.profile_photo
                                    ? "Change photo"
                                    : "Upload a photo"
                            }}</span>
                            <input
                                type="file"
                                class="hidden"
                                @change="updateProfilePhoto"
                                accept="image/*"
                            />
                        </label>
                        <p class="mt-1 text-xs text-gray-500">
                            JPG, PNG, or GIF (max 2MB)
                        </p>
                        <InputError
                            class="mt-1"
                            :message="form.errors.profile_photo"
                        />
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <InputLabel
                        for="name"
                        value="Full Name"
                        class="text-sm font-medium text-gray-700"
                    />

                    <div class="mt-1 relative">
                        <div
                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                        >
                            <svg
                                class="h-5 w-5 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                            </svg>
                        </div>
                        <TextInput
                            id="name"
                            type="text"
                            class="pl-10 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Enter your full name"
                        />
                    </div>

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <InputLabel
                        for="email"
                        value="Email Address"
                        class="text-sm font-medium text-gray-700"
                    />

                    <div class="mt-1 relative">
                        <div
                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                        >
                            <svg
                                class="h-5 w-5 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                        </div>
                        <TextInput
                            id="email"
                            type="email"
                            class="pl-10 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg"
                            v-model="form.email"
                            required
                            autocomplete="username"
                            placeholder="Enter your email address"
                        />
                    </div>

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
            </div>

            <div
                v-if="mustVerifyEmail && user.email_verified_at === null"
                class="bg-yellow-50 border border-yellow-200 rounded-lg p-4"
            >
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg
                            class="h-5 w-5 text-yellow-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"
                            />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">
                            Email verification required
                        </h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>
                                Your email address is unverified. Please verify
                                your email to access all features.
                            </p>
                            <Link
                                :href="route('verification.send')"
                                method="post"
                                as="button"
                                class="mt-2 inline-flex items-center text-sm font-medium text-yellow-800 hover:text-yellow-900 underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500"
                            >
                                Resend verification email
                            </Link>
                        </div>
                    </div>
                </div>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-3 bg-green-50 border border-green-200 rounded-lg p-3"
                >
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg
                                class="h-5 w-5 text-green-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                Verification email sent successfully!
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="flex items-center justify-between pt-6 border-t border-gray-200"
            >
                <div class="flex items-center gap-4">
                    <PrimaryButton
                        :disabled="form.processing"
                        class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:ring-blue-500 border-0 px-6 py-3 rounded-lg font-medium"
                    >
                        <svg
                            v-if="form.processing"
                            class="animate-spin -ml-1 mr-2 h-4 w-4 text-white"
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
                        {{ form.processing ? "Saving..." : "Save Changes" }}
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
                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>
                            Changes saved successfully!
                        </div>
                    </Transition>
                </div>
            </div>
        </form>
    </section>
</template>
