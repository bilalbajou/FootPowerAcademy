<script setup>
import { ref } from "vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

// Contact form state
import { useForm } from "@inertiajs/vue3";

const contactForm = useForm({
    name: "",
    phone: "",
    email: "",
    subject: "",
    message: "",
});
const contactSuccess = ref(false);

function submitContact() {
    contactSuccess.value = false;
    contactForm.post("/contact", {
        preserveScroll: true,
        onSuccess: () => {
            contactSuccess.value = true;
            contactForm.reset();
            setTimeout(() => {
                contactSuccess.value = false;
            }, 5000); // Increased timeout
        },
        onError: (errors) => {
            // Handle errors - Inertia automatically populates contactForm.errors
            console.log('Form submission errors:', errors);
        }
    });
}


function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}
</script>

<template>
    <Head>
        <title>FootPower Academy | Soccer Training & Youth Development</title>
        <meta
            name="description"
            content="FootPower Academy empowers young soccer players with expert coaching, modern facilities, and a supportive community. Train. Grow. Succeed."
        />
        <meta
            property="og:title"
            content="FootPower Academy | Soccer Training & Youth Development"
        />
        <meta
            property="og:description"
            content="Empowering the next generation of soccer stars. Join FootPower Academy for professional training, camps, and a passion for the game."
        />
        <meta
            property="og:image"
            content="/assets/images/footpoweracademy-removebg.png"
        />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://footpoweracademy.local/" />
    </Head>
    <div
        class="min-h-screen bg-gradient-to-br from-blue-900 via-blue-700 to-blue-500 flex flex-col"
    >
        <!-- Hero Section -->
        <section
            class="relative flex flex-col items-center justify-center text-center py-16 px-4 md:py-28"
        >
            <img
                src="/assets/images/footpoweracademy-removebg.png"
                alt="FootPower Academy Logo"
                class="w-32 h-32 md:w-40 md:h-40 mb-6 mx-auto drop-shadow-xl z-10 relative"
            />
            <h1
                class="text-5xl md:text-6xl font-extrabold text-white mb-4 drop-shadow-lg tracking-tight z-10 relative"
            >
                FootPower Academy
            </h1>
            <p
                class="text-2xl md:text-3xl text-blue-100 mb-8 max-w-2xl mx-auto z-10 relative"
            >
                Train. Grow. Succeed. Empowering the next generation of soccer
                stars.
            </p>
            <div class="flex gap-6 justify-center z-10 relative">
                <Link
                    :href="route('login')"
                    class="bg-white text-blue-800 font-semibold px-8 py-3 rounded shadow hover:bg-blue-50 transition"
                    >Login</Link
                >
                <Link
                    :href="route('register')"
                    class="bg-blue-600 text-white font-semibold px-8 py-3 rounded shadow hover:bg-blue-700 transition"
                    >Register</Link
                >
            </div>
            <div
                class="absolute inset-0 bg-[url('/assets/images/soccer-bg.jpg')] bg-cover bg-center opacity-20"
            ></div>
            <div
                class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-700 to-blue-500 opacity-70"
            ></div>
        </section>

        <!-- About Us Section -->
        <section class="bg-white/90 py-12 px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-blue-800 mb-4">
                    About FootPower Academy
                </h2>
                <p class="text-gray-700 text-lg mb-4">
                    At FootPower Academy, we nurture young talent and build
                    character through the beautiful game of soccer. Our mission
                    is to develop skills, teamwork, and confidence in every
                    athlete—preparing them for success both on and off the
                    field.
                </p>
                <ul
                    class="flex flex-wrap justify-center gap-8 text-blue-900 font-semibold text-lg mt-6"
                >
                    <li>Expert Coaching Staff</li>
                    <li>Modern Training Facilities</li>
                    <li>Personalized Development</li>
                    <li>Teamwork & Community</li>
                </ul>
            </div>
        </section>

        <!-- Programs Section -->
        <section class="py-12 px-4 bg-gradient-to-r from-blue-800 to-blue-600">
            <div class="max-w-5xl mx-auto">
                <h2 class="text-3xl font-bold text-white text-center mb-8">
                    Our Programs
                </h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div
                        class="bg-white/95 rounded-xl shadow p-6 flex flex-col items-center"
                    >
                        <span class="text-4xl mb-2">⚽</span>
                        <h3 class="font-bold text-blue-800 mb-2">
                            Youth Academy
                        </h3>
                        <p class="text-gray-700 text-center">
                            Ages 6-12. Foundational skill-building, fun, and
                            teamwork for young players.
                        </p>
                    </div>
                    <div
                        class="bg-white/95 rounded-xl shadow p-6 flex flex-col items-center"
                    >
                        <span class="text-4xl mb-2">🥅</span>
                        <h3 class="font-bold text-blue-800 mb-2">
                            Elite Training
                        </h3>
                        <p class="text-gray-700 text-center">
                            Ages 13-18. Advanced technical, tactical, and
                            physical development for aspiring athletes.
                        </p>
                    </div>
                    <div
                        class="bg-white/95 rounded-xl shadow p-6 flex flex-col items-center"
                    >
                        <span class="text-4xl mb-2">🏆</span>
                        <h3 class="font-bold text-blue-800 mb-2">
                            Summer Camps
                        </h3>
                        <p class="text-gray-700 text-center">
                            Seasonal camps open to all skill levels. Fun,
                            fitness, and friendly competition.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Coaches Section -->
        <section class="bg-white/90 py-12 px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-blue-800 mb-8">
                    Meet Our Coaches
                </h2>
                <div class="flex flex-wrap justify-center gap-8">
                    <div class="flex flex-col items-center">
                        <img
                            src="/assets/images/coach1.jpg"
                            alt="Coach Alex"
                            class="w-24 h-24 rounded-full object-cover mb-2 shadow"
                        />
                        <div class="font-bold text-blue-900">Coach Alex</div>
                        <div class="text-gray-600 text-sm">UEFA B Licensed</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <img
                            src="/assets/images/coach2.jpg"
                            alt="Coach Samira"
                            class="w-24 h-24 rounded-full object-cover mb-2 shadow"
                        />
                        <div class="font-bold text-blue-900">Coach Samira</div>
                        <div class="text-gray-600 text-sm">
                            Sports Science Expert
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <img
                            src="/assets/images/coach3.jpg"
                            alt="Coach Leo"
                            class="w-24 h-24 rounded-full object-cover mb-2 shadow"
                        />
                        <div class="font-bold text-blue-900">Coach Leo</div>
                        <div class="text-gray-600 text-sm">
                            Youth Development
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-12 px-4 bg-gradient-to-r from-blue-700 to-blue-500">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-white text-center mb-8">
                    What Our Players Say
                </h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white/95 rounded-xl shadow p-6">
                        <p class="text-gray-700 italic mb-2">
                            “I love training at FootPower Academy! The coaches
                            are amazing and I’ve made so many friends.”
                        </p>
                        <div class="font-bold text-blue-800">
                            — Amina, U12 Player
                        </div>
                    </div>
                    <div class="bg-white/95 rounded-xl shadow p-6">
                        <p class="text-gray-700 italic mb-2">
                            “My skills and confidence have grown so much. The
                            academy feels like family!”
                        </p>
                        <div class="font-bold text-blue-800">
                            — Youssef, U16 Player
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="py-12 px-4 bg-white/90">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-3xl font-bold text-blue-800 mb-6 text-center">
                    Contact Us
                </h2>
                <form @submit.prevent="submitContact" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label
                                for="contact_name"
                                class="block font-semibold text-blue-900 mb-1"
                                >Name</label
                            >
                            <input
                                v-model="contactForm.name"
                                type="text"
                                id="contact_name"
                                class="w-full rounded border border-blue-300 px-4 py-2 focus:ring-2 focus:ring-blue-400"
                                required
                            />
                            <span
                                v-if="contactForm.errors.name"
                                class="text-red-500 text-sm"
                                >{{ contactForm.errors.name }}</span
                            >
                        </div>
                        <div>
                            <label
                                for="contact_phone"
                                class="block font-semibold text-blue-900 mb-1"
                                >Phone</label
                            >
                            <input
                                v-model="contactForm.phone"
                                type="text"
                                id="contact_phone"
                                class="w-full rounded border border-blue-300 px-4 py-2 focus:ring-2 focus:ring-blue-400"
                            />
                            <span
                                v-if="contactForm.errors.phone"
                                class="text-red-500 text-sm"
                                >{{ contactForm.errors.phone }}</span
                            >
                        </div>
                    </div>
                    <div>
                        <label
                            for="contact_email"
                            class="block font-semibold text-blue-900 mb-1"
                            >Email</label
                        >
                        <input
                            v-model="contactForm.email"
                            type="text"
                            id="contact_email"
                            class="w-full rounded border border-blue-300 px-4 py-2 focus:ring-2 focus:ring-blue-400"
                            required
                        />
                        <span
                            v-if="contactForm.errors.email"
                            class="text-red-500 text-sm"
                            >{{ contactForm.errors.email }}</span
                        >
                    </div>
                    <div>
                        <label
                            for="contact_subject"
                            class="block font-semibold text-blue-900 mb-1"
                            >Subject</label
                        >
                        <input
                            v-model="contactForm.subject"
                            type="text"
                            id="contact_subject"
                            class="w-full rounded border border-blue-300 px-4 py-2 focus:ring-2 focus:ring-blue-400"
                            required
                        />
                        <span
                            v-if="contactForm.errors.subject"
                            class="text-red-500 text-sm"
                            >{{ contactForm.errors.subject }}</span
                        >
                    </div>
                    <div>
                        <label
                            for="contact_message"
                            class="block font-semibold text-blue-900 mb-1"
                            >Message</label
                        >
                        <textarea
                            v-model="contactForm.message"
                            id="contact_message"
                            rows="4"
                            class="w-full rounded border border-blue-300 px-4 py-2 focus:ring-2 focus:ring-blue-400"
                            required
                        ></textarea>
                        <span
                            v-if="contactForm.errors.message"
                            class="text-red-500 text-sm"
                            >{{ contactForm.errors.message }}</span
                        >
                    </div>
                    <div></div>
                    <div class="text-center">
    <div v-if="contactForm.errors.general" class="text-red-600 text-center font-semibold mb-2">
      {{ contactForm.errors.general[0] }}
    </div>
    <button
        type="submit"
        :disabled="contactForm.processing"
        class="bg-blue-600 text-white font-semibold px-8 py-3 rounded shadow hover:bg-blue-700 transition flex items-center justify-center min-w-[140px]"
    >
        <svg
            v-if="contactForm.processing"
            class="animate-spin mr-2 h-5 w-5 text-white"
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
                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
            ></path>
        </svg>
        <span>{{
            contactForm.processing
                ? "Sending..."
                : "Send Message"
        }}</span>
    </button>
</div>
                    <div
                        v-if="contactSuccess"
                        class="text-green-600 text-center font-semibold mt-2"
                    >
                        Thank you! Your message has been sent.
                    </div>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center text-blue-100 py-8 mt-12 bg-blue-900">
            &copy; {{ new Date().getFullYear() }} FootPower Academy. All rights
            reserved.
        </footer>
    </div>
</template>
