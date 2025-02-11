<script>
import { gsap } from "gsap";

export default {
    props: {
        strength: {
            type: Number,
            default: 12
        }
    },
    methods: {
        magneting(event) {
            const magnetButton = event.currentTarget;
            const bounding = magnetButton.getBoundingClientRect();

            gsap.to(magnetButton, {
                duration: 1,
                x: (((event.clientX - bounding.left) / magnetButton.offsetWidth) - 0.5) * this.strength,
                y: (((event.clientY - bounding.top) / magnetButton.offsetHeight) - 0.5) * this.strength,
                ease: "power4.out"
            });
        },
        resetMagnetSatate(event) {
            const magnetButton = event.currentTarget;
            gsap.to(magnetButton, {
                duration: 1,
                x       : 0,
                y       : 0,
                ease    : "power4.out"
            });
        }
    }
};
</script >

<template >
    <div class="magnetic" @mousemove="magneting" @mouseleave="resetMagnetSatate" >
        <slot ></slot >
    </div >
</template >
