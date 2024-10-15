import { reactive, computed } from 'vue'
const useSession = () => {
    const isLoggedIn = !!localStorage.getItem("AUTH_TOKEN")
    const userType = localStorage.getItem("USER_ROLE")
    const username = localStorage.getItem("USER_NAME")
    const id = localStorage.getItem("USER_ID")

    return {
        isLoggedIn,
        userType,
        username,
        id
    }
}
export default useSession