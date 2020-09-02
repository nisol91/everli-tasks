<template>
    <div class="row">
        <div class="col-md-6">
            <p class="font-weight-bolder">change directory task</p>

            <p>insert initial path</p>
            <div>
                <input type="text" name="initPath" v-model="initPath" />
                <p class="error" v-if="initPathErrors">{{ initPathErrors }}</p>
            </div>

            <p>insert command</p>
            <div>
                <input type="text" v-model="command" />
                <p class="error" v-if="commandErrors">{{ commandErrors }}</p>
            </div>
            <div class="btn btn-light btn-outline-dark" @click="changePath">
                calculate
            </div>
            <div>
                <p>final path:</p>
                <p v-if="finalPath">{{ finalPath }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <p>legend:</p>
            <p>'' => back to root</p>
            <p>'../new' => change folder</p>
            <p>'..' => back to parent folder</p>
            <p>'new' => go to child folder</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            command: "",
            initPath: "/a/b/c/d",
            finalPath: null,
            initPathErrors: null,
            commandErrors: null
        };
    },

    methods: {
        changePath() {
            this.initPathErrors = null;
            this.commandErrors = null;
            axios
                .get(`/api/changeDirectory`, {
                    params: {
                        command: this.command,
                        initPath: this.initPath
                    }
                })
                .then(response => {
                    console.log(response.data);
                    this.finalPath = response.data;
                    this.initPath = response.data;
                })
                .catch(err => {
                    console.log(err.response.data.message);
                    if (err.response.data.errors != null) {
                        this.initPathErrors =
                            err.response.data.errors["initPath"][0];
                    }

                    this.commandErrors = err.response.data.message;
                });
        }
    }
};
</script>

<style scoped>
.error {
    color: red;
}
</style>
