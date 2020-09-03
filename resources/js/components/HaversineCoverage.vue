<template>
    <div>
        haversine coverage -- works only locally (docker issues :( )
        <div>{{ result }}</div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            result: ""
        };
    },
    created() {
        axios.get(`/api/haversineCoverage`).then(response => {
            console.log(response.data);
            this.result = response.data;
        });
    }
};
</script>
