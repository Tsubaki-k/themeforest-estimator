<script setup >
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import {Link} from '@inertiajs/vue3';
import MagneticCursor from "@/Components/MagneticCursor.vue";

defineProps({
    canLogin      : {
        type: Boolean,
    },
    canRegister   : {
        type: Boolean,
    },
    ClassContainer: {
        type: String,
    }
});


</script >

<template >

    <!--    background elements-->
    <div class="dotted-bg" ></div >

    <!--    background elements-->
    <div class="area" >
        <ul class="circles" >
            <li ></li >
            <li ></li >
            <li ></li >
            <li ></li >
            <li ></li >
            <li ></li >
            <li ></li >
            <li ></li >
            <li ></li >
            <li ></li >
        </ul >
    </div >

    <div class="min-h-screen flex flex-col sm:justify-start items-center sm:pt-0 bg-gray-100 bg-gray-900 body-container bg-contain md:bg-cover " >
        <div class="container mx-auto fixed top-4 header-cc absolute md:fixed " >
            <div class="flex items-center py-5 px-8 justify-between header-container flex-wrap" >

                <Link class="flex lg:justify-center lg:col-start-2" :href="route('home')" >
                    <img src="/logo.png" class="h-10" >
                </Link >

                <nav class="-mx-3 x-1 justify-end hidden md:flex" >
                    <MagneticCursor strength="15">
                        <Link :href="route('home')"
                              class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] text-white hover:text-white/80 focus-visible:ring-white" >
                            Home
                        </Link >
                    </MagneticCursor >
                    <MagneticCursor strength="15">
                        <Link :href="route('estimate.data')"
                              class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] text-white hover:text-white/80 focus-visible:ring-white" >
                            Estimate
                        </Link >
                    </MagneticCursor >
                    <MagneticCursor strength="15">
                        <a href="https://github.com/Tsubaki-k" target="_blank"
                           class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] text-white hover:text-white/80 focus-visible:ring-white" >
                            GitHub
                        </a >
                    </MagneticCursor >
                </nav >
            </div >
        </div >

        <div class="container mx-auto main-container " >
            <div class="" >
                <slot />
            </div >
        </div >

        <footer class="py-16 text-center text-sm text-black text-white/50 z-50" >
            <p >Powered By Laravel v11.x & Vue v3.x with ❤️</p >
            <p class="flex justify-center gap-2">
                Author:
                <MagneticCursor strength="20">
                    <a href="https://github.com/Tsubaki-k" class="text-purple-500" >Tsubaki</a >
                </MagneticCursor></p >

        </footer >
    </div >
</template >


<style lang="scss" >
.body-container {
    //background-image : url("/bg.svg");
    padding-top : 130px;
}

.main-container {
    position : relative;
    z-index  : 20;
}

.header-cc {
    z-index : 50;
}

.header-container {
    backdrop-filter  : blur(5px);
    top              : 5px;
    z-index          : 50;
    position         : relative;
    border           : 1px solid #ffffff12;
    background-color : var(--glassy-bg);
    border-radius    : calc(var(--radius) * 1.5);
}

.area {
    width    : 100%;
    height   : 100vh;
    position : fixed;
}

.circles {
    position : absolute;
    top      : 0;
    left     : 0;
    width    : 100%;
    height   : 100%;
    overflow : hidden;
    z-index  : 0;
}

.circles li {
    position        : absolute;
    display         : block;
    list-style      : none;
    width           : 20px;
    height          : 20px;
    background      : rgb(46, 41, 65);
    animation       : animate 25s linear infinite;
    bottom          : -150px;
    backdrop-filter : blur(5px);
}

.circles li:nth-child(1) {
    left            : 25%;
    width           : 80px;
    height          : 80px;
    animation-delay : 0s;
}


.circles li:nth-child(2) {
    left               : 10%;
    width              : 20px;
    height             : 20px;
    animation-delay    : 2s;
    animation-duration : 12s;
}

.circles li:nth-child(3) {
    left            : 70%;
    width           : 20px;
    height          : 20px;
    animation-delay : 4s;
}

.circles li:nth-child(4) {
    left               : 40%;
    width              : 60px;
    height             : 60px;
    animation-delay    : 0s;
    animation-duration : 18s;
}

.circles li:nth-child(5) {
    left            : 65%;
    width           : 20px;
    height          : 20px;
    animation-delay : 0s;
}

.circles li:nth-child(6) {
    left            : 75%;
    width           : 110px;
    height          : 110px;
    animation-delay : 3s;
}

.circles li:nth-child(7) {
    left            : 35%;
    width           : 150px;
    height          : 150px;
    animation-delay : 7s;
}

.circles li:nth-child(8) {
    left               : 50%;
    width              : 25px;
    height             : 25px;
    animation-delay    : 15s;
    animation-duration : 45s;
}

.circles li:nth-child(9) {
    left               : 20%;
    width              : 15px;
    height             : 15px;
    animation-delay    : 2s;
    animation-duration : 35s;
}

.circles li:nth-child(10) {
    left               : 85%;
    width              : 150px;
    height             : 150px;
    animation-delay    : 0s;
    animation-duration : 11s;
}


@keyframes animate {

    0% {
        transform     : translateY(0) rotate(0deg);
        opacity       : 1;
        border-radius : 0;
    }

    100% {
        transform     : translateY(-1000px) rotate(720deg);
        opacity       : 0;
        border-radius : 50%;
    }

}
</style >
