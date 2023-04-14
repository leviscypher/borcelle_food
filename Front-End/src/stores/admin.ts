import { defineStore } from 'pinia'
import axios from 'axios'
import constants from '@/constants'

export const useAdminStore = defineStore('admin', {
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
    },
  },
  actions: {
    async fetchCategory() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/admin/categories/all', constants.routeApis.TOKEN)
        this.categorys = data.data.data
      } catch (error) {
        return
      }
    },
    async fetchAdd(categorys: any) {
      try {
        await axios.post(
          'http://127.0.0.1:8000/api/admin/categories/create',
          categorys,
          constants.routeApis.TOKEN_LOGOUT
        )
      } catch (error) {
        return
      }
    },
    async fetchEdit(id: any) {
      try {
        await axios
          .get(`http://127.0.0.1:8000/api/admin/categories/edit/${id}`, constants.routeApis.TOKEN)
          .then((res) => {
            this.editCategorys = res.data
          })
      } catch (error) {
        return
      }
    },
    async fetchUpdate(id: any, data: any) {
      try {
        await axios.post(`http://127.0.0.1:8000/api/admin/categories/update/${id}`, data, constants.routeApis.TOKEN)
      } catch (error) {
        return
      }
    },
    async fetchDelete(id: any) {
      try {
        await axios.delete(`http://127.0.0.1:8000/api/admin/categories/delete/${id}`, constants.routeApis.TOKEN)
      } catch (error) {
        return
      }
    },
  },
})

export const useAccountManagement = defineStore('account', {
  state: () => ({
    accounts: [],
    editAccounts: [],
  }),
  getters: {
    getAccounts(state) {
      return state.accounts
    },
    getEditAccounts(state) {
      return state.editAccounts
    },
  },
  actions: {
    async fetchAccounts() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/admin/user/all', constants.routeApis.TOKEN)
        this.accounts = data.data
      } catch (error) {
        return
      }
    },
    async fetchAdd(accounts: any) {
      try {
        await axios.post('http://127.0.0.1:8000/api/admin/user/create', accounts, constants.routeApis.TOKEN_LOGOUT)
      } catch (error) {
        return
      }
    },
    async fetchEdit(id: any) {
      try {
        await axios.get(`http://127.0.0.1:8000/api/admin/user/edit/${id}`, constants.routeApis.TOKEN).then((res) => {
          this.editAccounts = res.data
        })
      } catch (error) {
        return
      }
    },
    async fetchUpdate(id: any, data: any) {
      try {
        await axios.post(`http://127.0.0.1:8000/api/admin/user/update/${id}`, data, constants.routeApis.TOKEN)
      } catch (error) {
        return
      }
    },
    async fetchDelete(id: any) {
      try {
        await axios.delete(`http://127.0.0.1:8000/api/admin/user/delete/${id}`, constants.routeApis.TOKEN)
      } catch (error) {
        return
      }
    },
  },
})

export const usePosition = defineStore('position', {
  state: () => ({
    position: [],
  }),
  getters: {
    getPosition(state) {
      return state.position
    },
  },
  actions: {
    async fetchPosition() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/admin/position/all', constants.routeApis.TOKEN)
        this.position = data.data.data
      } catch (error) {
        return
      }
    },
    async fetchAdd(accounts: any) {
      try {
        await axios.post('http://127.0.0.1:8000/api/admin/position/create', accounts, constants.routeApis.TOKEN_LOGOUT)
      } catch (error) {
        return
      }
    },
    async fetchDelete(id: any) {
      try {
        await axios.delete(`http://127.0.0.1:8000/api/admin/position/delete/${id}`, constants.routeApis.TOKEN)
      } catch (error) {
        return
      }
    },
  },
})

export const useRole = defineStore('role', {
  state: () => ({
    role: [],
  }),
  getters: {
    getRole(state) {
      return state.role
    },
  },
  actions: {
    async fetchRoles() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/admin/role/all', constants.routeApis.TOKEN)
        this.role = data.data.data
      } catch (error) {
        return
      }
    },
  },
})
// product
export const useProduct = defineStore('product', {
  state: () => ({
    products: [],
    editproducts: [],
  }),
  getters: {
    getProduct(state) {
      return state.products
    },
    getEditproducts(state) {
      return state.editproducts
    },
  },
  actions: {
    async fetchProduct() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/admin/product/all', constants.routeApis.TOKEN)
        this.products = data.data.data
      } catch (error) {
        return
      }
    },
    async fetchAdd(product: any) {
      try {
        await axios.post('http://127.0.0.1:8000/api/admin/product/create', product, constants.routeApis.TOKEN_LOGOUT)
      } catch (error) {
        return
      }
    },
    async fetchEdit(id: any) {
      try {
        await axios.get(`http://127.0.0.1:8000/api/admin/product/edit/${id}`, constants.routeApis.TOKEN)
           .then((res) => {
          this.editproducts = res.data.data
           })
      } catch (error) {
        return
      }
    },
    async fetchUpdate(id: any, product: any) {
      try {
        console.log(product);
        
        await axios.post(`http://127.0.0.1:8000/api/admin/product/update/${id}`, product, constants.routeApis.TOKEN_LOGOUT)
      } catch (error) {
        return
      }
    },
    async fetchDelete(id: any) {
      try {
        await axios.delete(`http://127.0.0.1:8000/api/admin/product/delete/${id}`, constants.routeApis.TOKEN)
      } catch (error) {
        return
      }
    },
  },
})
