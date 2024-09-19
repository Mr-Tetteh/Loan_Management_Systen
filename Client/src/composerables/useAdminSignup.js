import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";

export default function useSignup() {
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
        let res = await axios.get('http://127.0.0.1:8000/api/all_users', config)
        users.value = res.data.data
    }

    const logout = async () =>{
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers : {Authorization: `Bearer ${token}`}
        }

        let res = await axios.post('http://127.0.0.1:8000/api/logout', {},config)
        localStorage.removeItem("AUTH_TOKEN")
        await router.push('/login')

    }

    const confirm_password = ref('')

    return {admin,
        confirm_password,

        users,
        get_users,

        logout
    }
}