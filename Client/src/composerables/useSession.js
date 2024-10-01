const useSession = () => {
    const isLoggedIn = !!localStorage.getItem("AUTH_TOKEN")
    const userType = localStorage.getItem("USER_ROLE")
    const username = localStorage.getItem("USER_NAME")

    return {
        isLoggedIn,
        userType,
        username
    }
}

export default useSession