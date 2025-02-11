<script setup >

import MagneticCursor from "@/Components/MagneticCursor.vue";

defineProps({
    title: {
        type: String,
        default: '',
    },
    price: {
        type: String,
        default: '',
    },
    price_currency: {
        type: String,
        default: '',
    },
    second_price: {
        type: String,
        default: '',
    },
    second_price_currency: {
        type: String,
        default: '',
    },
    container_class: {
        type: String,
        default: '',
    },
    is_second_price_avalible: {
        type: Boolean,
        default: false,
    },
    class: {
        type:String,
        default: '',
    }
})
</script >

<template >
    <div :class="class">
        <div :class="container_class" >
            <p class="title" >{{ title }}</p >
            <MagneticCursor class="flex w-full justify-between" strength="20" >
                <p class="price" ><i class="currency_icon" >
                    {{ price_currency }}</i >
                    {{ price }}
                </p >
            </MagneticCursor >
            <MagneticCursor class="flex w-full justify-between" strength="10" >
                <div class="currency flex justify-center" v-if="is_second_price_avalible" >
                    <i class="currency_icon" >{{ second_price_currency }}</i >
                    {{ second_price }}
                </div >
            </MagneticCursor >
        </div >
    </div >
</template>
<style scoped lang="scss" >

</style >
