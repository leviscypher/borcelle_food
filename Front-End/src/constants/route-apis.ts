const routeApis = {
    TOKEN: { headers: { Authorization: `Bearer ${localStorage.getItem("token")}` } },
    TOKEN_LOGOUT: {
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem("token"), 'Content-Type': 'multipart/form-data'
        }
    }
}

export default routeApis
