<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
const showingSidebar = ref(false);
</script>

<template>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Soccer Academy Sidebar -->
        <div
            class="fixed inset-y-0 left-0 z-40 w-64 bg-gradient-to-b from-blue-900 via-blue-800 to-blue-700 text-white shadow-xl transition-transform duration-300 ease-in-out transform"
            :class="
                showingSidebar
                    ? 'translate-x-0'
                    : '-translate-x-full lg:translate-x-0'
            "
        >
            <!-- Logo Area -->
            <div
                class="flex items-center justify-center h-20 border-b border-blue-600 bg-blue-800"
            >
                <div class="flex items-center space-x-3">
                    <img
                        src="/assets/images/footpoweracademy-removebg.png"
                        alt="FootPower Academy"
                        class="h-10 w-10"
                    />
                    <span class="text-xl font-bold text-white">FootPower</span>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="px-4 py-1 space-y-2">
                <!-- Dashboard -->

                <div class="pt-4">
                    <div class="space-y-1">
                        <Link
                            :href="route('dashboard')"
                            :class="
                                route().current('dashboard')
                                    ? 'bg-blue-600 text-white shadow-lg'
                                    : 'text-blue-100 hover:bg-blue-600 hover:text-white'
                            "
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                                    />
                                </svg>
                            </span>
                            <span>Dashboard</span>
                        </Link>
                    </div>
                </div>

                <!-- Players -->
                <div class="pt-4">
                    <div
                        class="text-xs font-medium text-blue-300 uppercase tracking-wider px-4 mb-3"
                    >
                        Players
                    </div>
                    <div class="space-y-1">
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                    />
                                </svg>
                            </span>
                            <span>Players List</span>
                        </Link>
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
                                    />
                                </svg>
                            </span>
                            <span>Add Player</span>
                        </Link>
                    </div>
                </div>

                <!-- Staff -->
                <div class="pt-4">
                    <div
                        class="text-xs font-medium text-blue-300 uppercase tracking-wider px-4 mb-3"
                    >
                        Staff
                    </div>
                    <div class="space-y-1">
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                    />
                                </svg>
                            </span>
                            <span>Staff List</span>
                        </Link>
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
                                    />
                                </svg>
                            </span>
                            <span>Add Member</span>
                        </Link>
                    </div>
                </div>

                <!-- Teams -->
                <div class="pt-4">
                    <div
                        class="text-xs font-medium text-blue-300 uppercase tracking-wider px-4 mb-3"
                    >
                        Teams
                    </div>
                    <div class="space-y-1">
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                                    />
                                </svg>
                            </span>
                            <span>Teams List</span>
                        </Link>
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                    />
                                </svg>
                            </span>
                            <span>Create Team</span>
                        </Link>
                    </div>
                </div>

                <!-- Training -->
                <div class="pt-4">
                    <div
                        class="text-xs font-medium text-blue-300 uppercase tracking-wider px-4 mb-3"
                    >
                        Training
                    </div>
                    <div class="space-y-1">
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                </svg>
                            </span>
                            <span>Schedule</span>
                        </Link>
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                    />
                                </svg>
                            </span>
                            <span>New Session</span>
                        </Link>
                    </div>
                </div>

                <!-- Matches & Competitions -->
                <div class="pt-4">
                    <div
                        class="text-xs font-medium text-blue-300 uppercase tracking-wider px-4 mb-3"
                    >
                        Matches & Competitions
                    </div>
                    <div class="space-y-1">
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                </svg>
                            </span>
                            <span>Calendar</span>
                        </Link>
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
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
                            </span>
                            <span>Results</span>
                        </Link>
                    </div>
                </div>

                <!-- Finances -->
                <div class="pt-4">
                    <div
                        class="text-xs font-medium text-blue-300 uppercase tracking-wider px-4 mb-3"
                    >
                        Finances
                    </div>
                    <div class="space-y-1">
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"
                                    />
                                </svg>
                            </span>
                            <span>Registrations / Payments</span>
                        </Link>
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                                    />
                                </svg>
                            </span>
                            <span>Expenses</span>
                        </Link>
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                    />
                                </svg>
                            </span>
                            <span>Financial Reports</span>
                        </Link>
                    </div>
                </div>

                <!-- Medical -->
                <div class="pt-4">
                    <div
                        class="text-xs font-medium text-blue-300 uppercase tracking-wider px-4 mb-3"
                    >
                        Medical
                    </div>
                    <div class="space-y-1">
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                    />
                                </svg>
                            </span>
                            <span>Medical Follow-up</span>
                        </Link>
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
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
                            </span>
                            <span>Injuries</span>
                        </Link>
                    </div>
                </div>

                <!-- Communication -->
                <div class="pt-4">
                    <div
                        class="text-xs font-medium text-blue-300 uppercase tracking-wider px-4 mb-3"
                    >
                        Communication
                    </div>
                    <div class="space-y-1">
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                                    />
                                </svg>
                            </span>
                            <span>Messaging</span>
                        </Link>
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"
                                    />
                                </svg>
                            </span>
                            <span>Announcements</span>
                        </Link>
                    </div>
                </div>

                <!-- Statistics & Reports -->
                <div class="pt-4">
                    <div
                        class="text-xs font-medium text-blue-300 uppercase tracking-wider px-4 mb-3"
                    >
                        Statistics & Reports
                    </div>
                    <div class="space-y-1">
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                    />
                                </svg>
                            </span>
                            <span>Reports</span>
                        </Link>
                    </div>
                </div>

                <!-- Settings -->
                <div class="pt-4">
                    <div
                        class="text-xs font-medium text-blue-300 uppercase tracking-wider px-4 mb-3"
                    >
                        Administration
                    </div>
                    <div class="space-y-1">
                        <Link
                            href="#"
                            class="group flex items-center gap-4 px-4 py-3 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200"
                        >
                            <span
                                class="flex items-center justify-center w-6 h-6"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                </svg>
                            </span>
                            <span>Settings</span>
                        </Link>
                    </div>
                </div>
            </nav>

            <!-- User Profile Section -->
            <div
                class="absolute bottom-0 left-0 right-0 p-4 border-t border-blue-600 bg-blue-800"
            >
                <div class="flex items-center gap-3 mb-3">
                    <div
                        class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center"
                    >
                        <span class="text-white font-medium text-sm">
                            {{
                                $page.props.auth.user.name
                                    .charAt(0)
                                    .toUpperCase()
                            }}
                        </span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-medium text-white truncate">
                            {{ $page.props.auth.user.name }}
                        </div>
                        <div class="text-xs text-blue-200 truncate">
                            {{ $page.props.auth.user.email }}
                        </div>
                    </div>
                </div>

                <!-- Profile Link -->
                <Link
                    :href="route('profile.edit')"
                    :class="
                        route().current('profile.edit')
                            ? 'bg-blue-600 text-white shadow-lg'
                            : 'text-blue-100 hover:bg-blue-600 hover:text-white'
                    "
                    class="w-full flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-200 text-sm mb-2"
                >
                    <span class="flex items-center justify-center w-5 h-5">
                        <svg
                            class="w-4 h-4"
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
                    </span>
                    <span>Profile</span>
                </Link>

                <!-- Logout Link -->
                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-blue-100 hover:bg-blue-600 hover:text-white transition-all duration-200 text-sm"
                >
                    <span class="flex items-center justify-center w-5 h-5">
                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                            />
                        </svg>
                    </span>
                    <span>Logout</span>
                </Link>
            </div>
        </div>

        <!-- Mobile Sidebar Overlay -->
        <div
            v-if="showingSidebar"
            class="fixed inset-0 z-30 bg-black bg-opacity-50 lg:hidden"
            @click="showingSidebar = false"
        ></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:ml-64">
            <nav class="border-b border-gray-100 bg-white">
                <!-- Primary Navigation Menu -->
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between">
                        <div class="flex">
                            <!-- Mobile Sidebar Toggle -->
                            <div class="flex items-center lg:hidden">
                                <button
                                    @click="showingSidebar = !showingSidebar"
                                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                                >
                                    <svg
                                        class="h-6 w-6"
                                        stroke="currentColor"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"
                                        />
                                    </svg>
                                </button>
                            </div>

                            <!-- Logo -->
                            <div class="flex shrink-0 items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800"
                                    />
                                </Link>
                            </div>

                            <!-- Navigation Links (removed Dashboard) -->
                            <div
                                class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex"
                            >
                                <!-- No links -->
                            </div>
                        </div>

                        <div class="hidden sm:ms-6 sm:flex sm:items-center">
                            <!-- Notifications Dropdown -->
                            <div class="relative ms-3">
                                <Dropdown align="right" width="64">
                                    <template #trigger>
                                        <button
                                            type="button"
                                            class="inline-flex items-center rounded-full border border-transparent bg-white p-1 focus:outline-none"
                                        >
                                            <svg
                                                class="h-7 w-7 text-gray-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                                />
                                            </svg>
                                        </button>
                                    </template>
                                    <template #content>
                                        <div class="py-2 w-64">
                                            <div
                                                class="px-4 py-2 border-b border-gray-100 flex items-start gap-3 hover:bg-gray-50 cursor-pointer"
                                            >
                                                <span
                                                    class="mt-1 text-blue-500"
                                                >
                                                    <svg
                                                        class="h-5 w-5"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M13 16h-1v-4h-1m1-4h.01"
                                                        />
                                                    </svg>
                                                </span>
                                                <div class="flex-1">
                                                    <div
                                                        class="font-semibold text-gray-800"
                                                    >
                                                        New player registered
                                                    </div>
                                                    <div
                                                        class="text-xs text-gray-500"
                                                    >
                                                        2 minutes ago
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="px-4 py-2 border-b border-gray-100 flex items-start gap-3 hover:bg-gray-50 cursor-pointer"
                                            >
                                                <span
                                                    class="mt-1 text-green-500"
                                                >
                                                    <svg
                                                        class="h-5 w-5"
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
                                                </span>
                                                <div class="flex-1">
                                                    <div
                                                        class="font-semibold text-gray-800"
                                                    >
                                                        Match result submitted
                                                    </div>
                                                    <div
                                                        class="text-xs text-gray-500"
                                                    >
                                                        10 minutes ago
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="px-4 py-2 flex items-start gap-3 hover:bg-gray-50 cursor-pointer"
                                            >
                                                <span
                                                    class="mt-1 text-yellow-500"
                                                >
                                                    <svg
                                                        class="h-5 w-5"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3"
                                                        />
                                                    </svg>
                                                </span>
                                                <div class="flex-1">
                                                    <div
                                                        class="font-semibold text-gray-800"
                                                    >
                                                        Upcoming training
                                                        session
                                                    </div>
                                                    <div
                                                        class="text-xs text-gray-500"
                                                    >
                                                        1 hour from now
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </Dropdown>
                            </div>
                            <!-- Settings Dropdown -->
                            <div class="relative ms-3">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center rounded-full border border-transparent bg-white p-1 focus:outline-none"
                                            >
                                                <span
                                                    class="relative flex items-center"
                                                >
                                                    <span
                                                        class="inline-block h-8 w-8 rounded-full bg-gray-200 overflow-hidden"
                                                    >
                                                        <svg
                                                            v-if="
                                                                !$page.props
                                                                    .auth.user
                                                                    .profile_photo_url
                                                            "
                                                            class="h-8 w-8 text-gray-400"
                                                            fill="currentColor"
                                                            viewBox="0 0 24 24"
                                                        >
                                                            <path
                                                                d="M24 0v24H0V0h24z"
                                                                fill="none"
                                                            />
                                                            <path
                                                                d="M12 12c2.7 0 8 1.34 8 4v2H4v-2c0-2.66 5.3-4 8-4zm0-2a4 4 0 100-8 4 4 0 000 8z"
                                                            />
                                                        </svg>
                                                        <img
                                                            v-else
                                                            :src="
                                                                $page.props.auth
                                                                    .user
                                                                    .profile_photo_url
                                                            "
                                                            alt="User avatar"
                                                            class="h-8 w-8 object-cover"
                                                        />
                                                    </span>
                                                    <!-- Online status dot -->
                                                    <span
                                                        class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-white bg-green-500"
                                                    ></span>
                                                </span>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink
                                            :href="route('profile.edit')"
                                        >
                                            Profile
                                        </DropdownLink>
                                        <DropdownLink
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                        >
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="
                                    showingNavigationDropdown =
                                        !showingNavigationDropdown
                                "
                                class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                            >
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex':
                                                !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex':
                                                showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{
                        block: showingNavigationDropdown,
                        hidden: !showingNavigationDropdown,
                    }"
                    class="sm:hidden"
                >
                    <div class="space-y-1 pb-3 pt-2">
                        <ResponsiveNavLink
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                        >
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="border-t border-gray-200 pb-1 pt-4">
                        <div class="px-4">
                            <div class="text-base font-medium text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="text-sm font-medium text-gray-500">
                                {{ $page.props.auth.user.email }}
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')">
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-4 md:p-8">
                <slot />
            </main>
        </div>
    </div>
</template>
