<script setup >
import {Head, Link, useForm, usePage} from '@inertiajs/vue3';
import BodyLayout from "@/Layouts/BodyLayout.vue";
import CommaSeperator from "@/Components/CommaSeparator.vue";
import DatePicker from 'vue3-persian-datetime-picker'
import Heading from "@/Components/Partials/Heading.vue";
import MagneticCursor from "@/Components/MagneticCursor.vue";
import EarningBox from "@/Components/EarningBox.vue";


defineProps({
    canLogin   : {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    page_data  : {
        type: Object,
    },

});

</script >

<template >
    <Head title="Estimation By Data" />

    <BodyLayout :can-login="canLogin" :can-register="canRegister" class-container="px-4" >

        <div class=" text-white flex flex-wrap px-3 sm:px-8 gap-6 md:gap-0" >

            <div class="box-container box2 w-full md:w-1/2 space-y-5 md:pr-6" >
                <Heading >Product Info</Heading >
                <div class="box-info space-y-3" >
                    <div class="box-info-item" >
                        <MagneticCursor class="flex w-full justify-between" strength="20" >
                            <p class="title" >Product's age</p >
                            <p class="data" >{{ page_data.age }}</p >
                        </MagneticCursor >
                    </div >
                    <div class="box-info-item" >
                        <MagneticCursor class="flex w-full justify-between" strength="20" >
                            <p class="title" >Product's age (by day)</p >
                            <p class="data" >{{ page_data.age_by_day }}</p >
                        </MagneticCursor >
                    </div >
                    <div class="box-info-item" >
                        <MagneticCursor class="flex w-full justify-between" strength="20" >
                            <p class="title" >Fee's present stage</p >
                            <p class="data" >{{ page_data.fee_stage_percent }}%</p >
                        </MagneticCursor >

                    </div >
                </div >
            </div >

            <div class="box-container box1 md:w-1/2 flex flex-wrap justify-between gap-3" >
                <div class="data-box" >
                    <p class="title" >Published Date</p >
                    <p class="data" >{{ page_data.published_date }}</p >
                </div >
                <div class="data-box" >
                    <p class="title" >Price</p >
                    <p class="data" >
                        <i class="currency_icon" >{{ page_data.price_currency }}</i >{{ page_data.price }}
                    </p >
                </div >
                <div class="data-box" >
                    <p class="title" >Sells Count</p >
                    <p class="data" >{{ page_data.sells }}</p >
                </div >
                <div class="data-box" v-if="page_data.is_second_price_avalible" >
                    <p class="title" > Value of {{ page_data.second_price_currency }}</p >
                    <p class="data" >{{ page_data.second_price }}</p >
                </div >
            </div >

            <div class="box-container box3 w-full flex flex-wrap items-center space-y-6" >

                <Heading class="w-full md:w-1/4" >Total Income</Heading >

                <div class="box-info flex flex-wrap w-full md:w-3/4 " >


                    <EarningBox class="w-full md:w-1/2 md:pr-4 pb-4 md:pb-0"
                                title="Total"
                                container_class="earning-box"
                                :price="page_data.total_income.total.price"
                                :price_currency="page_data.price_currency"
                                :second_price="page_data.total_income.total.second_price"
                                :second_price_currency="page_data.second_price_currency"
                                :is_second_price_avalible="page_data.is_second_price_avalible" >
                    </EarningBox >

                    <EarningBox class="w-full md:w-1/2 md:pr-4 pb-4 md:pb-0"
                                title="Pure"
                                container_class="earning-box"
                                :price="page_data.total_income.pure.price"
                                :price_currency="page_data.price_currency"
                                :second_price="page_data.total_income.pure.second_price"
                                :second_price_currency="page_data.second_price_currency"
                                :is_second_price_avalible="page_data.is_second_price_avalible" >
                    </EarningBox >

                </div >
            </div >

            <div class="box-container box4 w-full flex flex-wrap items-center space-y-6" >

                <Heading >Averages per:</Heading >

                <div class="box-info flex-wrap flex w-full" >


                    <!--                    <EarningBox class="w-full md:w-1/2"-->
                    <!--                                title=""-->
                    <!--                                container_class="earning-box"-->
                    <!--                                :price=""-->
                    <!--                                :price_currency="page_data.price_currency"-->
                    <!--                                :second_price=""-->
                    <!--                                :second_price_currency="page_data.second_price_currency"-->
                    <!--                                :is_second_price_avalible="page_data.is_second_price_avalible">-->
                    <!--                    </EarningBox>-->

                    <EarningBox class="w-full md:w-1/3 pb-4 md:pr-4"
                                title="Daily Av."
                                container_class="earning-box"
                                :price="page_data.average_per.day.price"
                                :price_currency="page_data.price_currency"
                                :second_price="page_data.average_per.day.second_price"
                                :second_price_currency="page_data.second_price_currency"
                                :is_second_price_avalible="page_data.is_second_price_avalible" >
                    </EarningBox >


                    <EarningBox class="w-full md:w-1/3 pb-4 md:pr-4"
                                title="Daily Av."
                                container_class="earning-box"
                                :price="page_data.average_per.day.price"
                                :price_currency="page_data.price_currency"
                                :second_price="page_data.average_per.day.second_price"
                                :second_price_currency="page_data.second_price_currency"
                                :is_second_price_avalible="page_data.is_second_price_avalible" >
                    </EarningBox >

                    <EarningBox class="w-full md:w-1/3 pb-4 md:pr-4"
                                title="Weekly Av."
                                container_class="earning-box"
                                :price="page_data.average_per.week.price"
                                :price_currency="page_data.price_currency"
                                :second_price="page_data.average_per.week.second_price"
                                :second_price_currency="page_data.second_price_currency"
                                :is_second_price_avalible="page_data.is_second_price_avalible" >
                    </EarningBox >

                    <EarningBox class="w-full md:w-1/3 pb-4 md:pr-4"
                                title="Monthly Av."
                                container_class="earning-box"
                                :price="page_data.average_per.month.price"
                                :price_currency="page_data.price_currency"
                                :second_price="page_data.average_per.month.second_price"
                                :second_price_currency="page_data.second_price_currency"
                                :is_second_price_avalible="page_data.is_second_price_avalible" >
                    </EarningBox >

                    <EarningBox class="w-full md:w-1/3 pb-4 md:pr-4"
                                title="6 Month Av"
                                container_class="earning-box"
                                :price="page_data.average_per.six_month.price"
                                :price_currency="page_data.price_currency"
                                :second_price="page_data.average_per.six_month.second_price"
                                :second_price_currency="page_data.second_price_currency"
                                :is_second_price_avalible="page_data.is_second_price_avalible" >
                    </EarningBox >

                    <EarningBox class="w-full md:w-1/3 pb-4 md:pr-4"
                                title="1 year Av"
                                container_class="earning-box"
                                :price="page_data.average_per.one_year.price"
                                :price_currency="page_data.price_currency"
                                :second_price="page_data.average_per.one_year.second_price"
                                :second_price_currency="page_data.second_price_currency"
                                :is_second_price_avalible="page_data.is_second_price_avalible" >
                    </EarningBox >

                </div >
            </div >

        </div >
    </BodyLayout >
</template >

<style lang="scss" >
.box-container {
}

.input-form {
    input {
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
    background-clip         : text;
    font-weight             : bold;
    line-height             : 5rem;
    background              : linear-gradient(to right, #09f1b8, #00a2ff, #ff00d2, #fed90f);
    -webkit-background-clip : text;
    -webkit-text-fill-color : transparent;
}

.data-box {
    @apply px-4 py-4 md:px-8 md:py-8 overflow-hidden;
    background              : rgb(255 255 255 / 2%);
    width                   : calc(50% - 6px);
    border-radius           : 50px;
    -webkit-backdrop-filter : blur(24px);
    backdrop-filter         : blur(10px);
    box-shadow              : 0 0 30px #ffffff0a inset;

    .title {
        @apply md:text-lg;
        letter-spacing : 2px;
        color          : var(--text-color);
        font-weight    : bold;
        opacity        : 1;
        text-transform : uppercase;
    }

    .data {
        @apply text-base sm:text-lg md:text-2xl;
        letter-spacing : 5px;
    }
}

.box-info-item {
    @apply w-full flex justify-between px-3 py-6 md:px-8 rounded-3xl;
    backdrop-filter : blur(25px);
    background      : rgba(255, 255, 255, 0.03);
    border          : 1px solid #ffffff08;
    font-size       : 1.1rem;
    overflow        : hidden;

    .title {
        opacity : 0.5;
        @apply text-base sm:text-lg;
    }

    .data {
        @apply text-base;
        font-size      : 1.4rem;
        color          : var(--color);
        letter-spacing : 2px;
        position       : relative;
        background     : #ffffff17;
        padding        : 50px;
        margin         : -50px;
        border-radius  : 79px;
    }
}

.earning-box {
    @apply space-y-3 p-3;
    backdrop-filter : blur(20px);
    background      : #ffffff0d;
    border-radius   : 35px;
    border          : 1px solid #ffffff08;

    .title {
        letter-spacing : 3px;
        opacity        : 0.5;
        text-align     : center;
    }

    .price, .currency {
        letter-spacing : 3px;
        display         : flex;
        justify-content : center;
    }

    .price {
        @apply text-base lg:text-2xl;
        backdrop-filter : blur(30px);
        border          : 1px solid rgba(255, 255, 255, 0.05);
        width           : 100%;
        padding         : 15px 20px;
        border-radius   : 20px;
        overflow        : hidden;
        color           : rgba(255, 255, 255, 0.7);

        .currency_icon {
            color       : var(--color);
            font-weight : bold;
        }
    }

    .currency {
        color           : #c2c2c2;
        opacity         : 0.8;
        width           : 100%;
        margin          : -3px 0 10px;

        .currency_icon {
            color       : var(--color);
            font-weight : bold;
        }
    }

}


</style >
