import {ref} from "vue";
import axios from "axios";

export default function useLogin() {
    const login_user = ref({
        email: "",
        password: ""
    })
    const {user} = ref([''])

    const password = ref('')

    const auth_user = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get(`http://127.0.0.1:8000/api/user`, config)
        user.value  = res.data.data

    }

    return {
        login_user,
        password,
        auth_user,
        user
    }
}