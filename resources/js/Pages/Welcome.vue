<script setup>
import { ref, onMounted } from "vue";
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

// Smooth scroll function
function smoothScrollTo(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Add smooth scroll behavior on mount
onMounted(() => {
    // Add CSS for smooth scrolling
    document.documentElement.style.scrollBehavior = 'smooth';
});
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
        <!-- Navigation Bar -->
        <nav class="relative z-30 bg-white/10 backdrop-blur-sm border-b border-white/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div class="flex items-center">
                        <img
                            src="/assets/images/footpoweracademy-removebg.png"
                            alt="FootPower Academy"
                            class="h-10 w-10 mr-3"
                        />
                        <span class="text-white font-bold text-lg">FootPower Academy</span>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a @click.prevent="smoothScrollTo('home')" href="#home" class="text-white hover:text-blue-200 transition font-medium cursor-pointer">Home</a>
                        <a @click.prevent="smoothScrollTo('about')" href="#about" class="text-white hover:text-blue-200 transition font-medium cursor-pointer">About</a>
                        <a @click.prevent="smoothScrollTo('programs')" href="#programs" class="text-white hover:text-blue-200 transition font-medium cursor-pointer">Programs</a>
                        <a @click.prevent="smoothScrollTo('coaches')" href="#coaches" class="text-white hover:text-blue-200 transition font-medium cursor-pointer">Our Coaches</a>
                        <a @click.prevent="smoothScrollTo('contact')" href="#contact" class="text-white hover:text-blue-200 transition font-medium cursor-pointer">Contact</a>
                    </div>

                    <div class="flex gap-4">
                        <Link
                            :href="route('login')"
                            class="bg-white/20 text-white font-semibold px-6 py-2 rounded-lg hover:bg-white/30 transition backdrop-blur-sm border border-white/30"
                            >Login</Link
                        >
                        <Link
                            :href="route('register')"
                            class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-700 transition"
                            >Register</Link
                        >
                    </div>
                </div>
            </div>
        </nav>
        <!-- Hero Section -->
        <section
            id="home"
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
            <!-- Login/Register buttons moved to navbar -->
            <div
                class="absolute inset-0 bg-[url('/assets/images/soccer-bg.jpg')] bg-cover bg-center opacity-20"
            ></div>
            <div
                class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-700 to-blue-500 opacity-70"
            ></div>
        </section>

        <!-- About Us Section -->
        <section id="about" class="bg-gradient-to-br from-gray-50 to-white py-16 px-4">
            <div class="max-w-7xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-blue-800 mb-6">
                        About FootPower Academy
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-blue-800 mx-auto mb-6"></div>
                    <p class="text-gray-700 text-xl leading-relaxed max-w-4xl mx-auto">
                        At FootPower Academy, we nurture young talent and build character through the beautiful game of soccer.
                        Our mission is to develop skills, teamwork, and confidence in every athlete—preparing them for success
                        both on and off the field.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mt-16">
                    <!-- Expert Coaching Staff -->
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 text-center group hover:-translate-y-2">
                        <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Expert Coaching Staff</h3>
                        <p class="text-gray-600 leading-relaxed">Certified professionals with years of experience in youth development and competitive soccer.</p>
                    </div>

                    <!-- Modern Training Facilities -->
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 text-center group hover:-translate-y-2">
                        <div class="bg-gradient-to-br from-green-500 to-green-700 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm12 12V6H4v10h12z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Modern Training Facilities</h3>
                        <p class="text-gray-600 leading-relaxed">State-of-the-art fields, equipment, and training facilities designed for optimal player development.</p>
                    </div>

                    <!-- Personalized Development -->
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 text-center group hover:-translate-y-2">
                        <div class="bg-gradient-to-br from-purple-500 to-purple-700 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Personalized Development</h3>
                        <p class="text-gray-600 leading-relaxed">Individual attention and customized training plans to help each player reach their full potential.</p>
                    </div>

                    <!-- Teamwork & Community -->
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 text-center group hover:-translate-y-2">
                        <div class="bg-gradient-to-br from-orange-500 to-red-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Teamwork & Community</h3>
                        <p class="text-gray-600 leading-relaxed">Building strong relationships, sportsmanship, and a supportive community atmosphere.</p>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="mt-16 bg-gradient-to-r from-blue-800 to-blue-600 rounded-3xl p-8 md:p-12">
                    <div class="grid md:grid-cols-3 gap-8 text-center text-white">
                        <div class="group">
                            <div class="text-4xl md:text-5xl font-bold mb-2 group-hover:scale-110 transition-transform duration-300">500+</div>
                            <div class="text-blue-100 text-lg">Students Trained</div>
                        </div>
                        <div class="group">
                            <div class="text-4xl md:text-5xl font-bold mb-2 group-hover:scale-110 transition-transform duration-300">15+</div>
                            <div class="text-blue-100 text-lg">Years Experience</div>
                        </div>
                        <div class="group">
                            <div class="text-4xl md:text-5xl font-bold mb-2 group-hover:scale-110 transition-transform duration-300">50+</div>
                            <div class="text-blue-100 text-lg">Trophies Won</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Programs Section -->
        <section id="programs" class="py-12 px-4 bg-gradient-to-r from-blue-800 to-blue-600">
            <div class="max-w-5xl mx-auto">
                <h2 class="text-3xl font-bold text-white text-center mb-8">
                    Our Programs
                </h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Junior Stars Program -->
                    <div class="bg-white/95 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 flex flex-col items-center group hover:scale-105 transform transition-transform">
                        <div class="bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full p-4 mb-4 group-hover:rotate-12 transition-transform duration-300">
                            <span class="text-3xl">🌟</span>
                        </div>
                        <h3 class="font-bold text-blue-800 mb-2 text-lg text-center">
                            Junior Stars
                        </h3>
                        <p class="text-sm text-blue-600 font-semibold mb-3">(Ages 6–10)</p>
                        <p class="text-gray-700 text-center text-sm leading-relaxed">
                            Fun, friendly sessions focused on coordination, teamwork, and basic football techniques. Ideal for beginners and young enthusiasts.
                        </p>
                    </div>

                    <!-- Youth Academy Program -->
                    <div class="bg-white/95 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 flex flex-col items-center group hover:scale-105 transform transition-transform">
                        <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-full p-4 mb-4 group-hover:rotate-12 transition-transform duration-300">
                            <span class="text-3xl">⚽</span>
                        </div>
                        <h3 class="font-bold text-blue-800 mb-2 text-lg text-center">
                            Youth Academy
                        </h3>
                        <p class="text-sm text-blue-600 font-semibold mb-3">(Ages 11–14)</p>
                        <p class="text-gray-700 text-center text-sm leading-relaxed">
                            Structured development program focusing on technical skills, tactical awareness, and match experience with certified coaches.
                        </p>
                    </div>

                    <!-- Elite Development Program -->
                    <div class="bg-white/95 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 flex flex-col items-center group hover:scale-105 transform transition-transform">
                        <div class="bg-gradient-to-br from-red-500 to-red-700 rounded-full p-4 mb-4 group-hover:rotate-12 transition-transform duration-300">
                            <span class="text-3xl">🏆</span>
                        </div>
                        <h3 class="font-bold text-blue-800 mb-2 text-lg text-center">
                            Elite Development
                        </h3>
                        <p class="text-sm text-blue-600 font-semibold mb-3">(Ages 15–18)</p>
                        <p class="text-gray-700 text-center text-sm leading-relaxed">
                            High-performance training designed to prepare players for national and international competitions and professional trials.
                        </p>
                    </div>

                    <!-- Goalkeeper Training Program -->
                    <div class="bg-white/95 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 flex flex-col items-center group hover:scale-105 transform transition-transform">
                        <div class="bg-gradient-to-br from-green-500 to-green-700 rounded-full p-4 mb-4 group-hover:rotate-12 transition-transform duration-300">
                            <span class="text-3xl">🥅</span>
                        </div>
                        <h3 class="font-bold text-blue-800 mb-2 text-lg text-center">
                            Goalkeeper Training
                        </h3>
                        <p class="text-sm text-blue-600 font-semibold mb-3">All Ages</p>
                        <p class="text-gray-700 text-center text-sm leading-relaxed">
                            Specialized sessions for aspiring goalkeepers focusing on reflexes, distribution, shot-stopping, and match situations.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Coaches Section -->
        <section id="coaches" class="bg-white/90 py-12 px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-blue-800 mb-8">
                    Meet Our Coaches
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-blue-800 mx-auto mb-6"></div>

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
        <section id="testimonials" class="py-16 px-4 bg-gradient-to-br from-blue-800 via-blue-700 to-blue-600 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 left-10 w-32 h-32 border-2 border-white rounded-full"></div>
                <div class="absolute top-32 right-20 w-24 h-24 border-2 border-white rounded-full"></div>
                <div class="absolute bottom-20 left-32 w-20 h-20 border-2 border-white rounded-full"></div>
            </div>

            <div class="max-w-7xl mx-auto relative z-10">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                        What Our Players Say
                    </h2>
                    <div class="w-24 h-1 bg-white mx-auto mb-6"></div>
                    <p class="text-blue-100 text-xl max-w-3xl mx-auto">
                        Hear from our amazing players and their families about their FootPower Academy experience
                    </p>
                </div>

                <!-- Testimonials Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 p-8 group hover:-translate-y-2">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-lg">A</span>
                            </div>
                            <div>
                                <div class="font-bold text-blue-800 text-lg">Amina</div>
                                <div class="text-blue-600 text-sm">U12 Player</div>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <span class="text-yellow-400 text-2xl">⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-gray-700 leading-relaxed italic">
                            "I love training at FootPower Academy! The coaches are amazing and I've made so many friends. Every session is fun and I'm getting better every day!"
                        </p>
                        <div class="mt-6 flex items-center">
                            <svg class="w-8 h-8 text-blue-200 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 p-8 group hover:-translate-y-2">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-lg">Y</span>
                            </div>
                            <div>
                                <div class="font-bold text-blue-800 text-lg">Youssef</div>
                                <div class="text-blue-600 text-sm">U16 Player</div>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <span class="text-yellow-400 text-2xl">⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-gray-700 leading-relaxed italic">
                            "My skills and confidence have grown so much since joining. The academy feels like family and the training is top-notch. I'm ready for the next level!"
                        </p>
                        <div class="mt-6 flex items-center">
                            <svg class="w-8 h-8 text-blue-200 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 p-8 group hover:-translate-y-2">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-lg">S</span>
                            </div>
                            <div>
                                <div class="font-bold text-blue-800 text-lg">Sarah</div>
                                <div class="text-blue-600 text-sm">Parent</div>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <span class="text-yellow-400 text-2xl">⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-gray-700 leading-relaxed italic">
                            "FootPower Academy has been incredible for my daughter. The coaches are professional, caring, and truly invested in each child's development. Highly recommended!"
                        </p>
                        <div class="mt-6 flex items-center">
                            <svg class="w-8 h-8 text-blue-200 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Testimonial 4 -->
                    <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 p-8 group hover:-translate-y-2">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-lg">K</span>
                            </div>
                            <div>
                                <div class="font-bold text-blue-800 text-lg">Karim</div>
                                <div class="text-blue-600 text-sm">U14 Player</div>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <span class="text-yellow-400 text-2xl">⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-gray-700 leading-relaxed italic">
                            "The goalkeeper training here is amazing! Coach helped me improve my reflexes and positioning. I feel confident between the posts now!"
                        </p>
                        <div class="mt-6 flex items-center">
                            <svg class="w-8 h-8 text-blue-200 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Testimonial 5 -->
                    <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 p-8 group hover:-translate-y-2">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-500 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-lg">L</span>
                            </div>
                            <div>
                                <div class="font-bold text-blue-800 text-lg">Layla</div>
                                <div class="text-blue-600 text-sm">U18 Player</div>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <span class="text-yellow-400 text-2xl">⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-gray-700 leading-relaxed italic">
                            "Thanks to FootPower Academy, I earned a scholarship to play college soccer! The elite training program prepared me perfectly for competitive play."
                        </p>
                        <div class="mt-6 flex items-center">
                            <svg class="w-8 h-8 text-blue-200 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Testimonial 6 -->
                    <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 p-8 group hover:-translate-y-2">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-lg">M</span>
                            </div>
                            <div>
                                <div class="font-bold text-blue-800 text-lg">Mohamed</div>
                                <div class="text-blue-600 text-sm">Parent</div>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <span class="text-yellow-400 text-2xl">⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-gray-700 leading-relaxed italic">
                            "The facilities are world-class and the coaching staff genuinely cares about each player's growth. My son has developed not just as a player, but as a person."
                        </p>
                        <div class="mt-6 flex items-center">
                            <svg class="w-8 h-8 text-blue-200 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <!-- Map Section -->
         <section id="map" class="py-16 px-4 bg-white">
            <div class="max-w-7xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-blue-800 mb-6">
                        Find Us
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-blue-800 mx-auto mb-6"></div>
                    <p class="text-gray-700 text-xl max-w-3xl mx-auto">
                        Visit FootPower Academy at our modern training facility in the heart of Casablanca's Sports District
                    </p>
                </div>

                <!-- Map Container -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <!-- Location Info Bar -->
                    <div class="bg-gradient-to-r from-blue-800 to-blue-600 text-white p-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex items-center mb-4 md:mb-0">
                                <div class="bg-white/20 rounded-full p-3 mr-4">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold">FootPower Academy</h3>
                                    <p class="text-blue-100">123 Soccer Street, Sports District, Casablanca, Morocco 20000</p>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="https://maps.google.com/?q=Casablanca" target="_blank" class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-lg transition flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    Get Directions
                                </a>
                                <a href="tel:+2125XXXXXXX" class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-lg transition flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                    </svg>
                                    Call Us
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Map Embed -->
                    <div class="relative">
                        <!-- Google Maps Embed -->


                        <!-- Alternative: You can replace the above div with actual Google Maps embed -->

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106376.73625972854!2d-7.669394073471071!3d33.572260199030794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!5e0!3m2!1sfr!2sma!4v1754407238525!5m2!1sfr!2sma"
                            width="100%"
                            height="500"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>

                    <!-- Additional Location Info -->
                    <div class="p-6 bg-gray-50">
                        <div class="grid md:grid-cols-3 gap-6">
                            <!-- Transportation -->
                            <div class="text-center">
                                <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path>
                                        <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1V8a1 1 0 00-1-1h-3z"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800 mb-1">Public Transport</h4>
                                <p class="text-sm text-gray-600">Metro Line 2 - Sports Station<br>Bus Lines 15, 23, 45</p>
                            </div>

                            <!-- Parking -->
                            <div class="text-center">
                                <div class="bg-green-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm3 5a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800 mb-1">Free Parking</h4>
                                <p class="text-sm text-gray-600">On-site parking available<br>50+ spaces for parents</p>
                            </div>

                            <!-- Nearby -->
                            <div class="text-center">
                                <div class="bg-purple-100 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800 mb-1">Nearby</h4>
                                <p class="text-sm text-gray-600">Sports Complex Mall<br>Restaurants & Cafés</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-16 px-4 bg-gradient-to-br from-gray-50 to-white">
            <div class="max-w-7xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-blue-800 mb-6">
                        Contact Us
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-blue-800 mx-auto mb-6"></div>
                    <p class="text-gray-700 text-xl max-w-3xl mx-auto">
                        Ready to join FootPower Academy? Get in touch with us today!
                    </p>
                </div>

                <!-- 2-Column Layout -->
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Left Column: Contact Form -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h3 class="text-2xl font-bold text-blue-800 mb-6">
                            Send us a Message
                        </h3>
                        <form @submit.prevent="submitContact" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        for="contact_name"
                                        class="block font-semibold text-blue-900 mb-2"
                                        >Name *</label
                                    >
                                    <input
                                        v-model="contactForm.name"
                                        type="text"
                                        id="contact_name"
                                        class="w-full rounded-lg border border-blue-300 px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:border-transparent transition"
                                        required
                                    />
                                    <span
                                        v-if="contactForm.errors.name"
                                        class="text-red-500 text-sm mt-1 block"
                                        >{{ contactForm.errors.name }}</span
                                    >
                                </div>
                                <div>
                                    <label
                                        for="contact_phone"
                                        class="block font-semibold text-blue-900 mb-2"
                                        >Phone</label
                                    >
                                    <input
                                        v-model="contactForm.phone"
                                        type="text"
                                        id="contact_phone"
                                        class="w-full rounded-lg border border-blue-300 px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:border-transparent transition"
                                    />
                                    <span
                                        v-if="contactForm.errors.phone"
                                        class="text-red-500 text-sm mt-1 block"
                                        >{{ contactForm.errors.phone }}</span
                                    >
                                </div>
                            </div>
                            <div>
                                <label
                                    for="contact_email"
                                    class="block font-semibold text-blue-900 mb-2"
                                    >Email *</label
                                >
                                <input
                                    v-model="contactForm.email"
                                    type="email"
                                    id="contact_email"
                                    class="w-full rounded-lg border border-blue-300 px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:border-transparent transition"
                                    required
                                />
                                <span
                                    v-if="contactForm.errors.email"
                                    class="text-red-500 text-sm mt-1 block"
                                    >{{ contactForm.errors.email }}</span
                                >
                            </div>
                            <div>
                                <label
                                    for="contact_subject"
                                    class="block font-semibold text-blue-900 mb-2"
                                    >Subject *</label
                                >
                                <input
                                    v-model="contactForm.subject"
                                    type="text"
                                    id="contact_subject"
                                    class="w-full rounded-lg border border-blue-300 px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:border-transparent transition"
                                    required
                                />
                                <span
                                    v-if="contactForm.errors.subject"
                                    class="text-red-500 text-sm mt-1 block"
                                    >{{ contactForm.errors.subject }}</span
                                >
                            </div>
                            <div>
                                <label
                                    for="contact_message"
                                    class="block font-semibold text-blue-900 mb-2"
                                    >Message *</label
                                >
                                <textarea
                                    v-model="contactForm.message"
                                    id="contact_message"
                                    rows="5"
                                    class="w-full rounded-lg border border-blue-300 px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:border-transparent transition"
                                    required
                                ></textarea>
                                <span
                                    v-if="contactForm.errors.message"
                                    class="text-red-500 text-sm mt-1 block"
                                    >{{ contactForm.errors.message }}</span
                                >
                            </div>

                            <div v-if="contactForm.errors.general" class="text-red-600 font-semibold">
                                {{ contactForm.errors.general[0] }}
                            </div>

                            <button
                                type="submit"
                                :disabled="contactForm.processing"
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold px-8 py-4 rounded-lg shadow-lg hover:from-blue-700 hover:to-blue-800 transition flex items-center justify-center"
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

                            <div
                                v-if="contactSuccess"
                                class="text-green-600 text-center font-semibold bg-green-50 p-4 rounded-lg"
                            >
                                ✅ Thank you! Your message has been sent successfully.
                            </div>
                        </form>
                    </div>

                    <!-- Right Column: Academy Info & Social Media -->
                    <div class="space-y-8">
                        <!-- Academy Information -->
                        <div class="bg-gradient-to-br from-blue-800 to-blue-600 rounded-2xl shadow-xl p-8 text-white">
                            <h3 class="text-2xl font-bold mb-6">
                                FootPower Academy
                            </h3>

                            <!-- Address -->
                            <div class="flex items-start mb-6">
                                <div class="bg-white/20 rounded-full p-3 mr-4 flex-shrink-0">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Address</h4>
                                    <p class="text-blue-100">
                                        123 Soccer Street<br>
                                        Sports District<br>
                                        Casablanca, Morocco 20000
                                    </p>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 rounded-full p-3 mr-4">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Phone</h4>
                                    <p class="text-blue-100">+212 5XX-XXXXXX</p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-center mb-8">
                                <div class="bg-white/20 rounded-full p-3 mr-4">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Email</h4>
                                    <p class="text-blue-100">info@footpoweracademy.com</p>
                                </div>
                            </div>

                            <!-- Operating Hours -->
                            <div class="border-t border-white/20 pt-6">
                                <h4 class="font-semibold mb-3">Training Hours</h4>
                                <div class="space-y-2 text-blue-100">
                                    <div class="flex justify-between">
                                        <span>Monday - Friday</span>
                                        <span>4:00 PM - 8:00 PM</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Saturday</span>
                                        <span>9:00 AM - 6:00 PM</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Sunday</span>
                                        <span>10:00 AM - 4:00 PM</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="bg-white rounded-2xl shadow-xl p-8">
                            <h3 class="text-2xl font-bold text-blue-800 mb-6">
                                Follow Us
                            </h3>
                            <p class="text-gray-600 mb-6">
                                Stay connected with FootPower Academy for the latest updates, training tips, and match highlights!
                            </p>

                            <div class="grid grid-cols-2 gap-4">
                                <!-- Facebook -->
                                <a href="#" class="flex items-center justify-center bg-blue-600 text-white p-4 rounded-xl hover:bg-blue-700 transition group">
                                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                    <span class="font-semibold">Facebook</span>
                                </a>

                                <!-- Instagram -->
                                <a href="#" class="flex items-center justify-center bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded-xl hover:from-purple-600 hover:to-pink-600 transition group">
                                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987 6.62 0 11.987-5.367 11.987-11.987C24.014 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.323-1.297C4.198 14.895 3.708 13.744 3.708 12.447s.49-2.448 1.297-3.323C5.902 8.198 7.053 7.708 8.35 7.708s2.448.49 3.323 1.297c.896.896 1.386 2.047 1.386 3.344s-.49 2.448-1.297 3.323c-.896.896-2.047 1.386-3.344 1.386zm7.718 0c-1.297 0-2.448-.49-3.323-1.297-.896-.896-1.386-2.047-1.386-3.344s.49-2.448 1.297-3.323c.896-.896 2.047-1.386 3.344-1.386s2.448.49 3.323 1.297c.896.896 1.386 2.047 1.386 3.344s-.49 2.448-1.297 3.323c-.896.896-2.047 1.386-3.344 1.386z"/>
                                    </svg>
                                    <span class="font-semibold">Instagram</span>
                                </a>

                                <!-- YouTube -->
                                <a href="#" class="flex items-center justify-center bg-red-600 text-white p-4 rounded-xl hover:bg-red-700 transition group">
                                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                    </svg>
                                    <span class="font-semibold">YouTube</span>
                                </a>

                                <!-- WhatsApp -->
                                <a href="#" class="flex items-center justify-center bg-green-500 text-white p-4 rounded-xl hover:bg-green-600 transition group">
                                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                    </svg>
                                    <span class="font-semibold">WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Footer -->
        <footer class="text-center text-blue-100 py-8 bg-blue-900">
            &copy; {{ new Date().getFullYear() }} FootPower Academy. All rights
            reserved.
        </footer>
    </div>
</template>
