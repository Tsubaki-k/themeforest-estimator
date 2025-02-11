<script setup>

defineProps({
    tag: {
        type   : String,
        default: 'h3',
    }
})
</script>

<template>
    <div class="title-style-container">
        <div class="title-style">
            <component :is="tag">
                <slot/>
            </component>
        </div>
    </div>
</template>


<style lang="scss">

%before-builder-title-style{
    content    : "";
    position   : absolute;
    height     : 0;
    width      : 0;
    transition : 0.3s;
    top        : 0;
    left       : 0;
}

.title-style-container{
    position : relative;

    & > *{
        display : flex;

        &:before, &:after{
            @extend %before-builder-title-style;
        }

        > *{
            position : relative;
            z-index  : 5;
        }
    }
}

.title-style{
    & > *{
        backdrop-filter : blur(15px);
        padding         : 22px 28px;
        border-radius   : 15px;
        margin-left     : 18px;
        font-size       : 1.7rem;
        color           : rgba(255, 255, 255, 0.7);
        letter-spacing  : 4px;
        text-shadow     : 2px 2px 0 var(--color), 1px 1px 0 var(--color);
        font-weight     : bold;
    }

    &:after{
        width         : 50px;
        height        : 50px;
        background    : var(--color);
        border-radius : 13px;
        top           : calc(50% - 25px);
        animation     : rotating 10s linear infinite;
    }
}
</style>
