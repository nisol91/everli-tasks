<template>
    <div>
        <nav class="navbar bg-white border-bottom navbar-light">
            <router-link
                class="navbar-brand mr-auto"
                v-bind:to="{ name: 'home' }"
                >Home</router-link
            >
            <router-link
                class="navbar-brand mr-auto"
                v-bind:to="{ name: 'reverseBinary' }"
                >Reverse binary</router-link
            >
            <router-link
                class="navbar-brand mr-auto"
                v-bind:to="{ name: 'changeDirectory' }"
                >Change Directory</router-link
            >
            <router-link
                class="navbar-brand mr-auto"
                v-bind:to="{ name: 'haversineCoverage' }"
                >Haversine Coverage</router-link
            >
        </nav>
        <div class="mainBox">
            <router-view></router-view>
        </div>
    </div>
</template>
