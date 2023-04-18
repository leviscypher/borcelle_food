
import { defineStore } from 'pinia'
import axios from "axios"
export const useAuthStore = defineStore("auth", {
    state: () => ({
        status: [],
        error: [],
        token: [],
        tokenAdmin: [],
    }),
    getters: {
        getError(state) {
            return state.error
        },
        getStatus(state) {
            return state.status
        },
    },
    actions: {
        async fetchLogin(dataLogin: any) {
            try {
                await axios.post('http://127.0.0.1:8000/api/login', dataLogin)
                    .then((res) => {
                        this.token = res.data.token
                        localStorage.setItem('token', this.token)
                    })
                    .catch((error) => {
                        this.error = error.response.status
                    })
            }
            catch (error) {
                return;

            }
        },
        async fetchLoginAdmin(dataLogin: any) {
            try {
                await axios.post('http://127.0.0.1:8000/api/login', dataLogin)
                    .then((res) => {
                        this.tokenAdmin = res.data.token
                        localStorage.setItem('token-admin', this.tokenAdmin)
                        
                    })
                    .catch((error) => {
                        // this.error = error.response.status
                    })
            }
            catch (error) {
                return;

            }
        },
        async fetchRegister(dataRegister: any) {
            try {
                await axios.post('http://127.0.0.1:8000/api/register', dataRegister)
                    .then((res) => {
                        this.status = res.status
                    })
                    .catch((error) => {
                        this.status = error.response.status
                    })
            }
            catch (error) {
                return;

            }
        }
    },
})