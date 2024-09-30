import {createRouter, createWebHistory} from 'vue-router'
import HomeView from '../views/user/HomeView.vue'
import LoginView from "@/views/auth/LoginView.vue";
import RegistrationView from "@/views/auth/RegistrationView.vue";
import ContactView from "@/views/user/ContactView.vue";
import LoanView from "@/views/user/LoanView.vue";
import AdminHomeView from "@/views/admin/AdminHomeView.vue";
import AdminLoanView from "@/views/admin/AdminLoanView.vue";
import AdminUserView from "@/views/admin/AdminUserView.vue";
import AllLoansView from "@/views/user/AllLoansView.vue";
import AdminAddUserView from "@/views/admin/AdminAddUserView.vue";
import AdminLoanEdit from "@/views/admin/AdminLoanEdit.vue";
import AdminLoanDetails from "@/views/admin/AdminLoanDetails.vue";
import AdminUserDetails from "@/views/admin/AdminUserDetails.vue";
import AdminUserEdit from "@/views/admin/AdminUserEdit.vue";


const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeView
        },
        {
            path: '/login',
            name: 'login',
            component: LoginView
        },
        {
            path: '/register',
            name: 'register',
            component: RegistrationView
        },

        {
            path: '/contact',
            name: 'contact',
            component: ContactView
        },
        {
            path: '/loan',
            name: 'loan',
            component: LoanView,
            meta: {
                requiresAuth: true,

            },
        },
        {
            path: '/all_loans',
            name: 'loans',
            component: AllLoansView,
            meta: {
                requiresAuth: true,

            },
        },



// Admin paths
        {
            path: '/admin_home',
            name: 'admin_home',
            component: AdminHomeView,
            meta: {
                requiresAuth: true,
                roles: ['ADMIN']
            },

        },
        {
            path: '/admin_loan',
            name: 'admin_loan',
            component: AdminLoanView,
            meta: {
                requiresAuth: true,
                roles: ['ADMIN']
            },
        },
        {
            path: '/admin_user',
            name: 'admin_user',
            component: AdminUserView,
            meta: {
                requiresAuth: true,
                roles: ['ADMIN']
            },
        },
        {
            path: '/admin_add_user',
            name: 'admin_add_user',
            component: AdminAddUserView,
            meta: {
                requiresAuth: true,
                roles: ['ADMIN']
            },
        },
        {
            path: '/loan/:id/edit',
            name: 'loan.edit',
            component: AdminLoanEdit,
            props:true,
            meta: {
                requiresAuth: true,
                roles: ['ADMIN']
            },
        },

        {
            path: '/user/:id/edit',
            name: 'user.edit',
            component: AdminUserEdit,
            props:true,
            meta: {
                requiresAuth: true,
                roles: ['ADMIN']
            },
        },

        {
            path: '/loan/:id/detail',
            name: 'loan.detail',
            component: AdminLoanDetails,
            props:true,
            meta: {
                requiresAuth: true,
                roles: ['ADMIN']
            },
        },
        {
            path: '/user/:id/detail',
            name: 'user.detail',
            component: AdminUserDetails,
            props:true,
            meta: {
                requiresAuth: true,
                roles: ['ADMIN']
            },
        },


    ]
})

router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem("AUTH_TOKEN")
    const userRole = localStorage.getItem("USER_ROLE")

    if (to.meta.requiresAuth && !isAuthenticated) {
        next({ name: "login", query: { redirect: to.fullPath } });
    } else if (to.meta.roles && Array.isArray(to.meta.roles) && userRole) {
        if (to.meta.roles.includes(userRole.toUpperCase())) {
            next();
        } else {
            next({ name: "home" });
        }
    } else {
        next();
    }
});
export default router
