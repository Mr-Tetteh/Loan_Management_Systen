import {ref} from 'vue'
import axios from "axios";
import router from "@/router/index.js";


export default function useLoan() {
    const loan = ref([])
    const loans = ref([])
    const userloan = ref([])


    const get_loans = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers : {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get('http://127.0.0.1:8000/api/all_loans', config)
        loans.value = res.data.data
    }

    const get_loan = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers : {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get('http://127.0.0.1:8000/api/all_user_loans', config)
        userloan.value = res.data.data
    }


    const storeloan = async (loan) => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers : {Authorization: `Bearer ${token}`}
        }
        try {
            let response = await axios.post('http://127.0.0.1:8000/api/loan', loan, config)
            await router.push('/all_loans')
        } catch (err) {
            console.log('error')
        }

        // console.log(loan)
    }


    return {
        get_loans,
        loans,

        loan,
        storeloan,

        userloan,
        get_loan

    }
}