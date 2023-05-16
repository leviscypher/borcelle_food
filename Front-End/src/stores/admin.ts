import { defineStore } from 'pinia'
import axios from 'axios'
import constants from '@/constants'

export const useAdminStore = defineStore('admin', {
  state: () => ({
    categorys: [],
    editCategorys: [],
    status: 0,
  }),
  getters: {
    getCategory(state) {
      return state.categorys
    },
    getEditCategorys(state) {
      return state.editCategorys
    },
    getStatus(state) {
      return state.status
    },
  },
  actions: {
    async fetchCategory() {
      try {
        const res = await axios.get('http://127.0.0.1:8000/api/admin/categories/all', constants.routeApis.TOKENADMIN)
        this.categorys = res.data
      } catch (error) {
        this.status = error.response.status
      }
    },
    async fetchAdd(categorys: any) {
      try {
        const res = await axios.post(
          'http://127.0.0.1:8000/api/admin/categories/create',
          categorys,
          constants.routeApis.TOKEN_LOGOUT_ADMIN
        )
        this.status = res.status
      } catch (error) {
        this.status = error.response.status
      }
    },
    async fetchEdit(id: any) {
      try {
        const res = await axios.get(
          `http://127.0.0.1:8000/api/admin/categories/edit/${id}`,
          constants.routeApis.TOKENADMIN
        )
        this.editCategorys = res.data
      } catch (error) {
        return
      }
    },
    async fetchUpdate(id: any, data: any) {
      try {
        const res = await axios.post(
          `http://127.0.0.1:8000/api/admin/categories/update/${id}`,
          data,
          constants.routeApis.TOKENADMIN
        )
        this.status = res.status 
      } catch (error) {
          this.status = error.response.status   
      }
    },
    async fetchDelete(id: any) {
      try {
        await axios.delete(`http://127.0.0.1:8000/api/admin/categories/delete/${id}`, constants.routeApis.TOKENADMIN)
      } catch (error) {
        this.status = error.response.status
      }
    },
  },
})

export const useAccountManagement = defineStore('account', {
  state: () => ({
    accounts: [],
    editAccounts: [],
    status: [],
  }),
  getters: {
    getAccounts(state) {
      return state.accounts
    },
    getEditAccounts(state) {
      return state.editAccounts
    },
    getStatus(state) {
      return state.status
    },
  },
  actions: {
    async fetchAccounts() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/admin/user/all', constants.routeApis.TOKENADMIN)
        this.accounts = data.data
      } catch (error) {
        return
      }
    },
    async fetchAdd(accounts: any) {
      try {
        await axios
          .post('http://127.0.0.1:8000/api/admin/user/create', accounts, constants.routeApis.TOKEN_LOGOUT_ADMIN)
          .then((res) => {
            this.status = res.status
          })
          .catch((res) => {
            this.status = res.response.status
          })
      } catch (error) {
        return
      }
    },
    async fetchEdit(id: any) {
      try {
        await axios
          .get(`http://127.0.0.1:8000/api/admin/user/edit/${id}`, constants.routeApis.TOKENADMIN)
          .then((res) => {
            this.editAccounts = res.data
          })
      } catch (error) {
        return
      }
    },
    async fetchUpdate(id: any, data: any) {
      try {
        await axios
          .post(`http://127.0.0.1:8000/api/admin/user/update/${id}`, data, constants.routeApis.TOKENADMIN)
          .then((res) => {
            this.status = res.status
          })
          .catch((res) => {
            this.status = res.response.status
          })
      } catch (error) {
        return
      }
    },
    async fetchDelete(id: any) {
      try {
        await axios.delete(`http://127.0.0.1:8000/api/admin/user/delete/${id}`, constants.routeApis.TOKENADMIN)
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
        const data = await axios.get('http://127.0.0.1:8000/api/admin/position/all', constants.routeApis.TOKENADMIN)
        this.position = data.data.data
      } catch (error) {
        return
      }
    },
    async fetchAdd(accounts: any) {
      try {
        await axios.post(
          'http://127.0.0.1:8000/api/admin/position/create',
          accounts,
          constants.routeApis.TOKEN_LOGOUT_ADMIN
        )
      } catch (error) {
        return
      }
    },
    async fetchDelete(id: any) {
      try {
        await axios.delete(`http://127.0.0.1:8000/api/admin/position/delete/${id}`, constants.routeApis.TOKENADMIN)
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
        const data = await axios.get('http://127.0.0.1:8000/api/admin/role/all', constants.routeApis.TOKENADMIN)
        this.role = data.data.data
      } catch (error) {
        return
      }
    },
  },
})
export const useProductStatus = defineStore('productStatus', {
  state: () => ({
    productStatus: [],
  }),
  getters: {
    getProductStatus(state) {
      return state.productStatus
    },
  },
  actions: {
    async fetchProductStatus() {
      try {
        const data = await axios.get(
          'http://127.0.0.1:8000/api/admin/product-status/all',
          constants.routeApis.TOKENADMIN
        )
        this.productStatus = data.data
      } catch (error) {
        return
      }
    },
  },
})
export const useGender = defineStore('gender', {
  state: () => ({
    gender: [],
  }),
  getters: {
    getGender(state) {
      return state.gender
    },
  },
  actions: {
    async fetchGender() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/admin/gender/all', constants.routeApis.TOKENADMIN)
        this.gender = data.data
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
    editproducts: {},
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
        const data = await axios.get('http://127.0.0.1:8000/api/admin/product/all', constants.routeApis.TOKENADMIN)
        this.products = data.data.data
      } catch (error) {
        return
      }
    },
    async fetchAdd(product: any) {
      try {
        await axios.post(
          'http://127.0.0.1:8000/api/admin/product/create',
          product,
          constants.routeApis.TOKEN_LOGOUT_ADMIN
        )
      } catch (error) {
        return
      }
    },
    async fetchEdit(id: any) {
      try {
        const data = await axios.get(
          `http://127.0.0.1:8000/api/admin/product/edit/${id}`,
          constants.routeApis.TOKENADMIN
        )
        this.editproducts = data.data
      } catch (error) {
        return
      }
    },
    async fetchUpdate(id: any, product: any) {
      try {
        await axios.post(
          `http://127.0.0.1:8000/api/admin/product/update/${id}`,
          product,
          constants.routeApis.TOKEN_LOGOUT_ADMIN
        )
      } catch (error) {
        return
      }
    },
    async fetchDelete(id: any) {
      try {
        await axios.delete(`http://127.0.0.1:8000/api/admin/product/delete/${id}`, constants.routeApis.TOKENADMIN)
      } catch (error) {
        return
      }
    },
  },
})

//order
export const useOrder = defineStore('order', {
  state: () => ({
    orders: [],
    orderDetail: [],
  }),
  getters: {
    getOrder(state) {
      return state.orders
    },

    getOrderDetail(state) {
      return state.orderDetail
    },
  },
  actions: {
    async fetchOrder(status = 0) {
      try {
        const data = await axios.get(
          'http://127.0.0.1:8000/api/admin/order/all/' + status,
          constants.routeApis.TOKENADMIN
        )
        this.orders = data.data
      } catch (error) {
        return
      }
    },

    async fetchOrderDetail(id: number) {
      try {
        const data = await axios.get(
          'http://127.0.0.1:8000/api/admin/order/detail/' + id,
          constants.routeApis.TOKENADMIN
        )
        this.orderDetail = data.data
      } catch (error) {
        return
      }
    },

    async updateStatus(order_id: number, status: any) {
      try {
        await axios.post(
          'http://127.0.0.1:8000/api/admin/order/update-status/' + order_id,
          status,
          constants.routeApis.TOKENADMIN
        )
      } catch (error) {
        return
      }
    },
  },
})

//user-info
export const useUserInfo = defineStore('user-info', {
  state: () => ({
    UserInfo: [],
    editUserInfo: [],
    status: [],
  }),
  getters: {
    getUserInfo(state) {
      return state.UserInfo
    },
    getEditUserInfo(state) {
      return state.editUserInfo
    },
    getStatus(state) {
      return state.status
    },
  },
  actions: {
    async fetchUserInfo() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/admin/user-info/all', constants.routeApis.TOKENADMIN)
        this.UserInfo = data.data.data
      } catch (error) {
        return
      }
    },
    async fetchAdd(id: any, userinfo: any) {
      try {
        await axios
          .post(
            `http://127.0.0.1:8000/api/admin/user-info/update/${id}`,
            userinfo,
            constants.routeApis.TOKEN_LOGOUT_ADMIN
          )
          .then((res) => {
            this.status = res.status
          })
          .catch((res) => {
            this.status = res.response.status
          })
      } catch (error) {
        return
      }
    },
    async fetchEdit(id: any) {
      try {
        await axios
          .get(`http://127.0.0.1:8000/api/admin/user-info/edit/${id}`, constants.routeApis.TOKENADMIN)
          .then((res) => {
            this.editUserInfo = res.data
          })
      } catch (error) {
        return
      }
    },
  },
})

export const useUser = defineStore('user', {
  state: () => ({
    status: '',
  }),
  getters: {
    getStatus(state) {
      return state.status
    },
  },
  actions: {
    async fetchUser() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/user-login', constants.routeApis.TOKENADMIN)
        console.log(data.status)
      } catch (error) {
        console.log(error.response.data)
      }
    },
  },
})
