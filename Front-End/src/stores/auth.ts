
import { defineStore } from 'pinia'
import axios from "axios"
export const useAuthStore = defineStore("auth", {
    state: () => ({
        auths: [],
    }),
    getters: {
        getAuths(state) {
            return state.auths
        },
    },
    actions: {
        // async fetchLogin(dataLogin:any) {
        //     try {
        //         await axios.post('http://127.0.0.1:8000/api/register', dataLogin)
        //     }
        //     catch (error) {
        //         return;
        //     }
        // },
        async fetchRegister(dataRegister:any) {
            try {
                await axios.post('http://127.0.0.1:8000/api/register', dataRegister)
            }
            catch (error) {
                return;
            }
        }
    },
})