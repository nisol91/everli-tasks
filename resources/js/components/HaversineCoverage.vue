<template>
    <div>
        haversine coverage -- works only locally (docker issues :( )
        <div v-if="loading">loading........</div>
        <div v-else>{{ result }}</div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            result: {},
            loading: true
        };
    },
    created() {
        axios.get(`/api/haversineCoverage`).then(response => {
            console.log(response.data);
            this.result = response.data;
            this.loading = false;
        });
    },
    methods: {}
};
</script>
