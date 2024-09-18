import {ref} from "vue";

export default function useLogin(){
const login_user = ref({
    email: "",
    password: ""
})

    const password = ref('')

    return {login_user, password}
}