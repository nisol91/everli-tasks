
import Home from "../js/components/Home";
import ReverseBinary from "../js/components/ReverseBinary";
import ChangeDirectory from "../js/components/ChangeDirectory";
import HaversineCoverage from "../js/components/HaversineCoverage";


import VueRouter from "vue-router";

const routes = [
    {
        path: "/",
        component: Home,
        name: "home"
    },
    {
        path: "/reverse-binary",
        component: ReverseBinary,
        name: "reverseBinary"
    },
    {
        path: "/change-dir",
        component: ChangeDirectory,
        name: "changeDirectory"
    },
    {
        path: "/haversine-coverage",
        component: HaversineCoverage,
        name: "haversineCoverage"
    },


]

const router = new VueRouter({
    // mode: 'history',
    routes,
})

export default router;
