const routeApis = {
    TOKEN: { headers: { Authorization: `Bearer ${localStorage.getItem("token")}` } },
    TOKENADMIN: { headers: { Authorization: `Bearer ${localStorage.getItem("token-admin")}` } },
    TOKEN_LOGOUT: {
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem("token"), 'Content-Type': 'multipart/form-data'
        }
    },
    TOKEN_LOGOUT_ADMIN: {
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem("token-admin"), 'Content-Type': 'multipart/form-data'
        }
    }
}

export default routeApis
