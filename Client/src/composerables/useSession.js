const useSession = () => {
    const isLoggedIn = !!localStorage.getItem("AUTH_TOKEN")
    const userType = localStorage.getItem("USER_TYPE")

    return {
        isLoggedIn,
        userType
    }
}

export default useSession