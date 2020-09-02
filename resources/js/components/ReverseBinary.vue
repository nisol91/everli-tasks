<template>
    <div>
        <p>reverse binary task</p>
        <div><input type="number" v-model="number" /></div>
        <div class="btn btn-light" @click="reverseBinary">calculate</div>
        <div>
            <p>result:</p>
            <p v-if="result">{{ result }}</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            number: 0,
            result: null
        };
    },

    methods: {
        reverseBinary() {
            let number = parseInt(this.number);

            // converting to binary string
            let binary = number.toString(2);
            console.log(number);
            console.log(binary);

            // reversing the binary string
            var reversedBinary = binary
                .split("")
                .reverse()
                .join("");
            console.log(reversedBinary);

            // converting binary to int
            var finalNumber = parseInt(reversedBinary, 2);
            console.log(finalNumber);
            this.result = finalNumber;
        }
    }
};
</script>
