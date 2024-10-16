import {ref, resolveDirective} from "vue";
import axios from "axios";
import router from "@/router/index.js";
import Swal from "sweetalert2";

export default function useSignup() {
    const user = ref ([]);
    const users = ref([]);
    const number = ref(0)

    const admin = ref({
        first_name: "",
        last_name: "",
        other_names: "",
        email: "",
        password: "",
        phone: "",
        country: "",
        date_of_birth: "",
        salary: "",
        user_type:"",
        national_id: "",
        nationality: ""
    })
    const get_users = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers : {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get('http://127.0.0.1:8000/api/Admin_all_users', config)
        users.value = res.data.data
    }

    const number_of_users = async () => {
        const token = localStorage.getItem('AUTH_TOKEN');
        const config = {
            headers: { Authorization: `Bearer ${token}` }
        };
        try {
            let res = await axios.get('http://127.0.0.1:8000/api/total', config);
            number.value = res.data.total;
        } catch (error) {
            console.error("Error fetching total number of users:", error);
        }
    };
    const get_deleted_users = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers : {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get('http://127.0.0.1:8000/api/deleted', config)
        users.value = res.data.data
    }

    const updated_user = async (id) => {
        Swal.fire({
            title: "Are you sure you want to perform this action on this user?",
            text: "You can revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, I am sure!"
        }).then(async (result) => {
            if (result.isConfirmed) {
                await Swal.fire({
                    title: "User status changed !",
                    text: "User status has been updated successfully.",
                    icon: "success"
                });
                await update_user(id)
                await get_users()
            }
        });

    }
    const update_user = async (id) => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        try{
            let res = await  axios.patch(`http://127.0.0.1:8000/api/users/${id}`, user.value, config)

            await router.push('../../admin_user')
        }catch (err){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: (err),
            });
        }
    }


    const updated_user_profile = async (id) => {
        Swal.fire({
            title: "Are you sure you want to update your details",
            text: "You can update this again!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, I am sure!"
        }).then(async (result) => {
            if (result.isConfirmed) {
                await Swal.fire({
                    title: "Details updated !",
                    text: "Your details have been updated successfully.",
                    icon: "success"
                });
                await update_user_profile(id)
                // await get_users()
            }
        });

    }

    const update_user_profile = async (id) => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        try{
            let res = await  axios.patch(`http://127.0.0.1:8000/api/users/${id}`, user.value, config)

            await router.push('/')
        }catch (err){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: (err.response.data.message),
            });
        }
    }


    const update_user_password = async (id) => {
        const token = localStorage.getItem('AUTH_TOKEN');
        const config = {
            headers: { Authorization: `Bearer ${token}` }
        };

        try {
            let res = await axios.patch(`http://127.0.0.1:8000/api/users_password/${id}`, {
                old_password: old_password.value,
                new_password: new_password.value
            }, config);

            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your Password has been updated successfully",
                showConfirmButton: false,
                timer: 1500
            });
        } catch (err) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: err.response.data.message,
            });
        }
    }

    const get_user = async (id) => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers : {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get(`http://127.0.0.1:8000/api/users/${id}`, config)
        user.value = res.data.data
    }

    const auth_user = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get(`http://127.0.0.1:8000/api/users`, config)
        user.value  = res.data.data

    }

    const restoreUser = async (id) => {

        Swal.fire({
                title: "Are you sure you want to restore this User?",
                text: "You can delete this user back if you want to!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, restore it!"
            }
        ).then(async (result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Restored!",
                    text: "User has been restored successfully.",
                    icon: "success"
                });
                await restoreuser(id)
                await get_users()
            }
        });

    }
    const restoreuser = async (id) =>{
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        await axios.get(`http://127.0.0.1:8000/api/restore/${id}`, config)
        users.value.splice(users.value.indexOf(id), 1)

    }


    const logout = async () =>{
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers : {Authorization: `Bearer ${token}`}
        }

        let res = await axios.post('http://127.0.0.1:8000/api/logout', {},config)
        localStorage.removeItem("AUTH_TOKEN")
        localStorage.removeItem("USER_ROLE")
        localStorage.removeItem("USER_NAME")
        await router.push('/login')

    }

    const confirm_password = ref('')
    const new_password = ref('')
    const old_password = ref('')



    const deleteuser = async (id) => {

        Swal.fire({
            title: "Are you sure you want to delete this user?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(async (result) => {
            if (result.isConfirmed) {
                await Swal.fire({
                    title: "Deleted!",
                    text: "User has been deleted successfully.",
                    icon: "success"
                });
                await destoryuser(id)
                await get_users()
            }
        });

    }
    const destoryuser = async (id) =>{
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        await axios.delete(`http://127.0.0.1:8000/api/users/${id}`, config)
        users.value.splice(users.value.indexOf(id), 1)

    }


    return {
        admin,
        confirm_password,
        user,
        get_user,
        destoryuser,
        deleteuser,
        update_user,
        get_deleted_users,
        restoreuser,
        restoreUser,
        number_of_users,
        users,
        get_users,
        auth_user,
        logout,
        number,
        updated_user,
        updated_user_profile,
        new_password,
        old_password,
        update_user_password
    }
}