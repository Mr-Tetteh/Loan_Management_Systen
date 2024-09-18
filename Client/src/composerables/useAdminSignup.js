import {ref} from "vue";

export default function useSignup() {
    const user = ref({
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

    const confirm_password = ref('')

    return {user, confirm_password}
}