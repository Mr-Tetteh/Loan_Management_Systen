import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";

export default function useSignup() {
    const user = ref ([]);
    const users = ref([]);

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
    const update_user = async (id) => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        try{
            let res = await  axios.patch(`http://127.0.0.1:8000/api/users/${id}`, user.value, config)
            await router.push('../../admin_user')
        }catch (err){
            console.log(err)
        }
    }

    const get_user = async (id) => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers : {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get(`http://127.0.0.1:8000/api/users/${id}`,   config)
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
        update_user,
        users,
        get_users,
        auth_user,
        logout
    }
}