import {ref} from 'vue'
import axios from "axios";
import router from "@/router/index.js";
import Swal from "sweetalert2";


const useLoan = () => {
    const loan = ref(null)
    const loans = ref([])
    const userloan = ref([])
    const number_of_approve = ref(0)
    const number_of_pending = ref(0)
    const number_of_rejected = ref(0)
    const number_of_compeleted = ref(0)
    const searchLoan = ref([])


    const get_loans = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get('http://127.0.0.1:8000/api/admin_all_loans', config)
        loans.value = res.data.data
    }
    const get_active_loans = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get('http://127.0.0.1:8000/api/active_loans', config)
        loans.value = res.data.data
    }


    const get_pending_loans = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get('http://127.0.0.1:8000/api/pending_loans', config)
        loans.value = res.data.data
    }

    const compeleted_loans = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get('http://127.0.0.1:8000/api/compeleted_loans', config)
        loans.value = res.data.data
    }



    const get_rejected_loans = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get('http://127.0.0.1:8000/api/rejected_loans', config)
        loans.value = res.data.data
    }

    const get_user_history_loans = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get('http://127.0.0.1:8000/api/history_loans', config)
        loans.value = res.data.data
    }

    const numb_of_approve_loans = async () => {
        const token = localStorage.getItem('AUTH_TOKEN');
        const config = {
            headers: { Authorization: `Bearer ${token}` }
        };
        try {
            let res = await axios.get('http://127.0.0.1:8000/api/approved', config);
            number_of_approve.value = res.data.total;
        } catch (error) {
            console.error("Error fetching total number of users:", error);
        }
    };

    const numb_of_rejected_loans = async () => {
        const token = localStorage.getItem('AUTH_TOKEN');
        const config = {
            headers: { Authorization: `Bearer ${token}` }
        };
        try {
            let res = await axios.get('http://127.0.0.1:8000/api/rejected', config);
            number_of_rejected.value = res.data.total;
        } catch (error) {
            console.error("Error fetching total number of users:", error);
        }
    };

    const numb_of_pending_loans = async () => {
        const token = localStorage.getItem('AUTH_TOKEN');
        const config = {
            headers: { Authorization: `Bearer ${token}` }
        };
        try {
            let res = await axios.get('http://127.0.0.1:8000/api/pending', config);
            number_of_pending.value = res.data.total;
        } catch (error) {
            console.error("Error fetching total number of users:", error);
        }
    };

    const numb_of_compeleted_loans = async () => {
        const token = localStorage.getItem('AUTH_TOKEN');
        const config = {
            headers: { Authorization: `Bearer ${token}` }
        };
        try {
            let res = await axios.get('http://127.0.0.1:8000/api/compeleted_loans_count', config);
            number_of_compeleted.value = res.data.total;
        } catch (error) {
            console.error("Error fetching total number of users:", error);
        }
    };

    const get_loan = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get('http://127.0.0.1:8000/api/loan', config)
        userloan.value = res.data.data
    }

    const get_loan_update = async (id) => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        let res = await axios.get(`http://127.0.0.1:8000/api/loans/${id}`, config)
        loan.value = res.data.data
    }


    const storeloan = async (loan) => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        try {
            let response = await axios.post('http://127.0.0.1:8000/api/loans', loan, config)
            await Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 1500
            });
            await router.push('/all_loans')
        } catch (err) {
            Swal.fire({
                icon: "error",
                title: "Sorry...",
                text: (err.response.data.message),
            });

        }

        // console.log(loan)
    }

    const updateloan = async (id) => {
        // console.log(id)
        // console.log(post.value)
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        try {
            let res = await axios.patch(`http://127.0.0.1:8000/api/loans/${id}`, loan.value, config)
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Loan status has been saved",
                showConfirmButton: false,
                timer: 1500
            });
            await router.push('../../admin_loan')
        } catch (err) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: (err),
            });
        }
    }

    const payloan = async (id) => {
        // console.log(id)
        // console.log(post.value)
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        try {
            let res = await axios.patch(`http://127.0.0.1:8000/api/loans/${id}`, loan.value, config)
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Monthly Deduction saved!",
                showConfirmButton: false,
                timer: 1500
            });
            await router.push('../../all_loans')
        } catch (err) {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: (err),
            });
        }
    }

    const deleteloan = async (id) => {

            Swal.fire({
                title: "Are you sure you want to delete this Loan record?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }
            ).then(async (result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Loan has been deleted successfully.",
                        icon: "success"
                    });
                    await destoryloan(id)
                    await get_loans()
                }
            });

    }
    const destoryloan = async (id) => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        await axios.delete(`http://127.0.0.1:8000/api/loans/${id}`, config)
        loans.value.splice(loans.value.indexOf(id), 1)

        // console.log(loan)
    }



    return {
        get_loans,
        loans,
        loan,
        storeloan,
        userloan,
        get_loan,
        updateloan,
        get_loan_update,
        payloan,
        deleteloan,

        number_of_approve,
        numb_of_approve_loans,

        number_of_pending,
        numb_of_pending_loans,
        compeleted_loans,

        numb_of_rejected_loans,
        number_of_rejected,
        get_active_loans,
        get_pending_loans,
        get_rejected_loans,
        get_user_history_loans,
        numb_of_compeleted_loans,
        number_of_compeleted,
    }
}

export  default  useLoan