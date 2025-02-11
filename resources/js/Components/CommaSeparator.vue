<template>

    <div :class="classname">

        <small :class="{'opened'  : error }" class="error-class">
            {{ error }}
        </small>

        <input
            type="text"
            class="form-control"
            :class="[classInput, {'input-error': error}, 'tracking-wider']"
            :id="id"
            :name="id"
            :value="formattedValue"
            autocomplete="off"
            @input="value = $event.target.value"
            :disabled="this.disabled"
        >

        <label :for="id" class="form-label">{{ label }}</label>
    </div>

</template>

<script>
export default {
    name : 'CommaSeperator',
    props: {
        id        : String,
        label     : String,
        class     : String,
        classname : String,
        val       : String,
        small     : String,
        error     : String,
        disabled  : String,
        classInput: String,
        price     : {
            type   : Boolean,
            default: false
        },
        inputType : {
            type   : String,
            default: "text"
        },
        unit      : {
            type   : Boolean,
            default: false,
        },
        unittxt  : {
            type   : String,
            default: 'تومان',
        },
    },
    data() {
        return {
            value         : this.val || '',
            formattedValue: this.val || '',
            texttt        : '',

        };
    },
    methods: {
        units(key) {
            const units = ['', 'k', 'm', 'b', '', '', '', '', '', ''];
            return units[key];
        },
        priceText(number) {
            const numberComma = number.toLocaleString();
            const numberArr = numberComma.split(',');
            const numberArrReverse = numberArr.reverse();

            const newNumberArr = [];
            numberArrReverse.forEach((num, key) => {
                if (parseInt(num) !== 0) {
                    newNumberArr.push(parseInt(num) + ' ' + this.units(key));
                }
            });
            const newArrReverse  = newNumberArr.reverse();
            let   minimal_filter = newArrReverse;
            const joined         = minimal_filter.join(' و ');
            return joined;
        }
    },

    watch: {
        value(newValue, oldVal) {
            // console.log(newValue, oldVal);
            if (newValue === '') {
                this.formattedValue = ''; // Clear formattedValue when input is empty
                this.texttt         = '';
            } else {
                const rawValue = newValue.replace(/,/g, '');

                // Check if the rawValue can be parsed into a valid number
                if (!isNaN(rawValue)) {
                    this.formattedValue = parseFloat(rawValue).toLocaleString();
                    this.texttt = this.priceText(this.formattedValue);
                } else {
                    // Handle non-numeric input, e.g., display an error message
                    this.formattedValue = '';
                    this.texttt = 'Invalid Input';
                }
            }
            this.$emit('update:val', newValue);
        },
    },

    mounted() {

        if( this.val ){
            let stringedValue = this.val.toString();
            const priceWithComma = parseFloat(stringedValue.replace(/,/g, '')).toLocaleString();
            // console.log(aaa)
            this.formattedValue = priceWithComma;
            // this.$emit('update:val', aaa);
            this.texttt = this.priceText(this.formattedValue);
        }
    }
}
</script>
