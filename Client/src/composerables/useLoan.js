import {ref} from 'vue'

export default function useLoan() {

    const loan = ref ({
        purpose: "",
        amount: "",
    })

    return {loan}
}