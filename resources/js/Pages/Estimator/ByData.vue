<script setup >
import {Head, Link, useForm, usePage} from '@inertiajs/vue3';
import BodyLayout from "@/Layouts/BodyLayout.vue";
import CommaSeperator from "@/Components/CommaSeparator.vue";
import DatePicker from 'vue3-persian-datetime-picker'
import Selectbox from "@/Components/Selectbox.vue";
import MagneticCursor from "@/Components/MagneticCursor.vue";


defineProps({
    canLogin    : {
        type: Boolean,
    },
    canRegister : {
        type: Boolean,
    },
    achived_data: {
        'type': Object,
    }
});

const user = usePage().props.auth.user;

const form = useForm({
    sells                : '',
    price                : '',
    price_currency       : 'usd',
    second_price         : '',
    second_price_currency: 'eur',
    publish_date         : '',
});


</script >


<template >
    <Head title="Estimation By Data" />

    <BodyLayout :can-login="canLogin" :can-register="canRegister" class-container="px-4" >
        <div class="px-6 text-white" >
            <div class="flex flex-wrap items-center space-y-6" >

                <h2 class="w-full md:w-1/2 heading-title" >ThemeForest <br > Earnings <br >Estimator</h2 >

                <div class="w-full md:w-1/2 " >
                    <form @submit.prevent="form.post(route('estimate.data.store'))"
                          class="input-form flex flex-wrap space-y-5 justify-between items-start" >

                        <MagneticCursor class="w-full" >
                            <CommaSeperator classname="flex flex-col-reverse"
                                            id="price1"
                                            :unit="true"
                                            :comma-separator="true"
                                            v-model:val="form.sells"
                                            :error="form.errors.sells"
                                            label="Sell Count *" >
                            </CommaSeperator >
                        </MagneticCursor >

                        <MagneticCursor class=" w-3/4" >
                            <CommaSeperator classname="flex flex-col-reverse"
                                            id="price"
                                            :unit="true"
                                            :comma-separator="true"
                                            v-model:val="form.price"
                                            :error="form.errors.price"
                                            label="Price *" >
                            </CommaSeperator >
                        </MagneticCursor >

                        <MagneticCursor class=" w-1/5" >
                            <Selectbox classname="flex flex-col-reverse"
                                       id="unit"
                                       v-model:val="form.price_currency"
                                       :options="achived_data.price_currencies"
                                       :error="form.errors.price_currency"
                                       label="Currency" >
                            </Selectbox >
                        </MagneticCursor >

                        <MagneticCursor class=" w-3/4" >
                            <CommaSeperator classname="flex flex-col-reverse"
                                            id="second_price"
                                            :unit="true"
                                            :comma-separator="true"
                                            v-model:val="form.second_price"
                                            :error="form.errors.second_price"
                                            label="Second Price Value (your's)" >
                            </CommaSeperator >
                        </MagneticCursor >

                        <MagneticCursor class=" w-1/5" >
                            <Selectbox classname="flex flex-col-reverse"
                                       id="unit"
                                       v-model:val="form.second_price_currency"
                                       :options="achived_data.price_currencies"
                                       :error="form.errors.second_price_currency"
                                       label="Currency" >
                            </Selectbox >
                        </MagneticCursor >

                            <div class="datetime-container  w-full" >
                                <span class="datetime-label" >Published Date *</span >
                                <DatePicker
                                    v-model="form.publish_date"
                                    format="YYYY-MM-DD"
                                    locale="en"
                                    lab="aa"
                                    display-format="jYYYY-jMM-jDD" />
                                <span class="error-class" v-if="form.errors.publish_date" >
                                {{ form.errors.publish_date }}
                            </span >
                            </div >

                        <div v-if="Object.keys(form.errors).length !== 0" >
                            <div class="bg-red-500 px-6 py-4 rounded-2xl opacity-60 text-white w-full " >
                                Please correct inputs then send the form again.
                            </div >
                        </div >
                        <MagneticCursor class="!w-full" strength="50">
                            <input type="submit" value="Estimate" class="!w-full">
                        </MagneticCursor >

                    </form >
                </div >
            </div >
        </div >
    </BodyLayout >
</template >

<style lang="scss" >

.input-form {
    input, select {
        //background      : transparent;
        backdrop-filter : blur(15px);
        border          : var(--border);
        border-radius   : var(--radius);
        background      : var(--glassy-bg);
        padding         : 15px 18px 12px;
        position        : relative;
        z-index         : 10;
        font-size       : 1.5rem;
        transition      : 0.3s;

        &:before, &:after {
            color : #fff;
        }

        &:focus {
            box-shadow : 0 10px 33px -20px var(--color);
            outline    : none;
            transform  : translateY(-5px);
            transition : all 0.3s, box-shadow 1s;
            border     : 1px solid var(--color);

            & + label {
                transform      : translateY(-5px);
                color          : var(--text-color);
                letter-spacing : 0.08rem;
                font-weight    : bold;
                text-shadow    : 0 0 0px var(--color);
            }
        }
    }

    select {
        font-size  : 0.9rem;
        min-height : 55px;

        option {
            font-size  : 0.9rem;
            background : var(--bg-card);
        }
    }

    label, .datetime-label {
        margin                  : 0 0 -10px 30px;
        position                : relative;
        z-index                 : 20;
        letter-spacing          : 0.05rem;
        color                   : rgba(255, 255, 255, 0.8);
        -webkit-backdrop-filter : blur(10px);
        backdrop-filter         : blur(2px);
        width                   : -moz-fit-content;
        width                   : fit-content;
        padding                 : 0 5px;
        transition              : 0.3s;
        font-size               : 1rem;
        text-shadow             : 0 0 6px var(--color);
    }

    input[type="submit"] {
        border     : 2px solid var(--color);
        color      : var(--text-color);
        cursor     : pointer;
        transition : 0.3s;

        &:hover {
            letter-spacing : 0.2rem;
            transition     : all 0.3s, letter-spacing 2s;
        }
    }
}

.datetime-label {
    margin-bottom : -10px;
    display       : block;
}

.heading-title {
    @apply text-4xl md:text-5xl lg:text-8xl text-center md:text-left;
    background-clip         : text;
    font-weight             : bold;
    background              : linear-gradient(to right, #09f1b8, #00a2ff, #ff00d2, #fed90f);
    -webkit-background-clip : text;
    -webkit-text-fill-color : transparent;
}

</style >
