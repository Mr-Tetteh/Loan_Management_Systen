import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";
import Swal from "sweetalert2";
export default function useLogin() {
    const login_user = ref({
        email: "",
        password: ""
    })


    const forgot = ref(null)

   const token = ref(null)

    const {user} = ref([''])
    const reset = ref(null)

    const password = ref('')
    const confirm_password = ref(null)
    const email = ref(null)

    const auth_user = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get(`https://loan.local.stay/api/user`, config)
        user.value  = res.data.data

    }

    const forgotPassword = async (forgot) =>{
        try {
            const res = await axios.post('https://loan.local.stay/api/forgot', forgot)
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: (res.data.message),
            });
        } catch (err) {
            Swal.fire({
                icon: "error",
                title: "Sorry...",
                text: (err.res.data.message),
            });
        }
    }

    const reset_password = async (reset) =>{
        try {
            const res = await axios.post(`https://loan.local.stay/api/reset`, reset)
            await Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your Password has been Changed!",
                showConfirmButton: false,
                timer: 1500
            });
            await router.push('/login')
        }catch (err){
            await Swal.fire({
                icon: "error",
                title: "Sorry...",
                text: (err.response.data.message),
            });
        }
    }

    return {
        login_user,
        password,
        auth_user,
        user,
        forgot,
        forgotPassword,
        reset_password,
        token,
        reset,
        confirm_password

    }
}