import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";
import Swal from "sweetalert2";

export default function usePayments() {
    const payments = ref([])
    const payment = ref([])

    const storepayments = async (payment) => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        try {
            let res = await axios.post('http://127.0.0.1:8000/api/pay_loans', payment, config)
            await Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 1500
            });
            await router.push('/admin_active_loan')
        } catch (err) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: (err.response.data.message),
            });
        }
    }
    const all_loan_payments = async (id) => {
        const token = localStorage.getItem('AUTH_TOKEN');
        const config = {
            headers: { Authorization: `Bearer ${token}` }
        };
        let res = await axios.get(`http://127.0.0.1:8000/api/loan_payments/${id}`, config);
        payments.value = res.data.data;
    };



    const get_user_history_loans = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get('http://127.0.0.1:8000/api/history_loans', config)
        payments.value = res.data.data
    }

    const get_payment = async (id) => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get(`http://127.0.0.1:8000/api/payments/${id}`, config)
        payment.value = res.data.data

    }

    return {
        storepayments,
        all_loan_payments,
        get_payment,
        get_user_history_loans,
        payment,
        payments
    }
}