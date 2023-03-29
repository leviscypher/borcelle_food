
import { defineStore } from 'pinia'
import axios from "axios"
import constants from '@/constants'

export const useAdminStore = defineStore("admin", {
    state: () => ({
        categorys: [],
        editCategorys: [],
    }),
    getters: {
        getCategory(state) {
            return state.categorys
        },
        getEditCategorys(state) {
            return state.editCategorys
        }
    },
    actions: {
        async fetchCategory() {
            try {
                const data = await axios.get('http://127.0.0.1:8000/api/admin/categories/all', constants.routeApis.TOKEN)
                this.categorys = data.data.data
            }
            catch (error) {
              return;
            }
        },
        async fetchAdd(categorys: any) {
            try {
                await axios.post('http://127.0.0.1:8000/api/admin/categories/create', categorys, constants.routeApis.TOKEN_LOGOUT);
            }
            catch (error) {
                return;
            }
        },
        async fetchEdit(id: any) {
            try {
                const data = await axios.get(`http://127.0.0.1:8000/api/admin/categories/edit/${id}`, constants.routeApis.TOKEN)
                this.editCategorys = data.data
            }
            catch (error) {
                return;
            }
        },
        async fetchUpdate(id: any, data: any) {
            try {
                await axios.post(`http://127.0.0.1:8000/api/admin/categories/update/${id}`, data, constants.routeApis.TOKEN)
            }
            catch (error) {
                return;
            }
        },
        async fetchDelete(id: any) {
            try {
                await axios.get(`http://127.0.0.1:8000/api/admin/categories/update/${id}`, constants.routeApis.TOKEN)
            }
            catch (error) {
                return;
            }
        },
    },
})