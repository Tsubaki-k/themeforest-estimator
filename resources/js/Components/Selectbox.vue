<template>
    <div :class="classname">
        <small :class="{ 'opened': error }" class="error-class">
            {{ error }}
        </small>

        <select
            class="form-control"
            :class="[classInput, { 'input-error': error }, 'tracking-wider']"
            :id="id"
            :name="id"
            v-model="selectedValue"
            :disabled="disabled"
        >
<!--            <option value="" disabled>{{ placeholder }}</option>-->
            <option v-for="(option, index) in options" :key="index" :value="option.value">
                {{ option.label }}
            </option>
        </select>

        <label :for="id" class="form-label">{{ label }}</label>
    </div>
</template>

<script>
export default {
    name: "Selectbox",
    props: {
        id        : String,
        label     : String,
        classname : String,
        classInput: String,
        error     : String,
        disabled  : Boolean,
        val       : [String, Number], // Syncs with v-model
        placeholder: {
            type   : String,
            default: "Select..."
        },
        options: {
            type: Array,
            required: true,
            default: () => []
            /*
             Expected format:
             [
             { value: "option1", label: "Option 1" },
             { value: "option2", label: "Option 2" }
             ]
             */
        }
    },
    data() {
        return {
            selectedValue: this.val || ""
        };
    },
    watch: {
        selectedValue(newValue) {
            this.$emit("update:val", newValue);
        },
        val(newValue) {
            this.selectedValue = newValue;
        }
    }
};
</script>
