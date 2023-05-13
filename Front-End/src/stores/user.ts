import { defineStore } from 'pinia'
import axios from 'axios'
import constants from '@/constants'


export const useProduct = defineStore('product', {
  state: () => ({
    products: [],
    product: {},
  }),
  getters: {
    getProducts(state) {
      return state.products
    },
    getProduct(state) {
      return state.product
    },
  },
  actions: {
    async fetchProducts(page = 1) {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/get/product/all?page=' + page)
        this.products = data.data
      } catch (error) {
        return error
      }
    },
    async fetchProduct(id:Number) {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/get/product/get-product/' + id)
        this.product = data.data
      } catch (error) {
        return error
      }
    },
    async searchData(query:any) {
      try {
        const data = await axios.post('http://127.0.0.1:8000/api/customer/search/'+ query)
        this.products = data.data
        
      } catch (error) {
        return error
      }
    },
    async searchCategory(category_id:Number) {
      try {
        const data = await axios.post('http://127.0.0.1:8000/api/customer/search-category/'+ category_id)
        this.products = data.data
        
      } catch (error) {
        return error
      }
    }
  },
})

export const useCategory = defineStore('category', {
  state: () => ({
    categories: [],
  }),
  getters: {
    getCategories(state) {
      return state.categories
    },
   
  },
  actions: {
    async fetchCategories() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/get/categories/all');
        this.categories = data.data
      } catch (error) {
        return error
      }
    },
  },
})

export const useCart = defineStore('cart', {
  state: () => ({
    cartNumber: 0,
  }),
  getters: {
    getCartNumber(state) {
      return state.cartNumber
    },
  },
  actions: {
    changeCartNumber(count: Number) {
      this.cartNumber = count
    },
  },
})


export const useUserInfo = defineStore('user-info', {
  state: () => ({
    user: {},
    userInfo: {},
    status: 0,
  }),
  getters: {
    getUserInfo(state){
      return state.userInfo
    },
    getUser(state) {
      return state.user
    },
    getStatus(state) {
      return state.status
    },
    getErrors(state) {
      return state.errors
    }

  },
  actions: {
    async fetchUserInfo(id:Number) {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/user-info/edit/'+ id, constants.routeApis.TOKEN);
        this.userInfo = data.data
      } catch (error) {
        return error
      }
    },
    async fetchUser() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/user-login', constants.routeApis.TOKEN);
        this.user = data.data
      } catch (error) {
        return error
      }
    },
    async fetchAdd(id: any, userinfo: any) {
      try {
        await axios
          .post(
            `http://127.0.0.1:8000/api/customer/user-info/update/${id}`,
            userinfo,
            constants.routeApis.TOKEN
          )
      } catch (error) {
        return
      }
    },
    async userSuccess() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/user-login', constants.routeApis.TOKEN);
        this.status = data.status
      } catch (error) {
        this.status = error.response.status
      }
    }
  }
})

export const useAddress = defineStore('address', {
  state: () => ({
    address: [],
    addressCreate: {},
    addressEdit: {},
    city: [],
    district: [],
    ward: [],
    addressActive: {}
  }),
  getters: {
    getAddress(state) {
      return state.address
    },
    getAddressCreate(state) {
      return state.addressCreate
    },
    getAddressEdit(state) {
      return state.addressEdit
    },
    getCity(state) {
      return state.city
    },
    getDistrict(state) {
      return state.district
    },
    getWard(state) {
      return state.ward
    },
    getAddressActive(state) {
      return state.addressActive
    }
  },
  actions: {
    async fetchAddress(user_id: Number) {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/address/' + user_id, constants.routeApis.TOKEN);
        this.address = data.data
      } catch (error) {
        return error
      }
    },

    async fetchCreate(user_id: Number, address:any) {
      try {
        await axios.post('http://127.0.0.1:8000/api/customer/address/store/' + user_id, address, constants.routeApis.TOKEN);
      } catch (error) {
        return error
      }
    },

    async fetchUpdate(address_id: Number, address:any) {
      try {
        await axios.post('http://127.0.0.1:8000/api/customer/address/update/' + address_id, address, constants.routeApis.TOKEN);
      } catch (error) {
        return error
      }
    },

    async fetchDelete(address_id: Number) {
      try {
        await axios.delete('http://127.0.0.1:8000/api/customer/address/delete/' + address_id, constants.routeApis.TOKEN);
      } catch (error) {
        return error
      }
    },

    async fetchAddressCreate(user_id: Number) {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/address/create/' + user_id, constants.routeApis.TOKEN);
        this.addressCreate = data.data
        
      } catch (error) {
        return error
      }
    },

    async fetchAddressActive(user_id: Number) {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/address/active/' + user_id, constants.routeApis.TOKEN);
        this.addressActive = data.data
        
      } catch (error) {
        return error
      }
    },

    async fetchAddressEdit(address_id: Number) {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/address/edit/' + address_id, constants.routeApis.TOKEN);
        this.addressEdit = data.data
        
      } catch (error) {
        return error
      }
    },

    async fetchCity() {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/get/city', constants.routeApis.TOKEN);
        this.city = data.data
        
      } catch (error) {
        return error
      }
    },

    async fetchDistrict(city_id:number) {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/get/district/' + city_id, constants.routeApis.TOKEN);
        this.district = data.data
        
      } catch (error) {
        return error
      }
    },

    async fetchWard(district_id:number) {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/get/ward/' + district_id, constants.routeApis.TOKEN);
        this.ward = data.data
        
      } catch (error) {
        return error
      }
    },

    async updateActive(address_id:number, user_id:number) {
      try {
        await axios.post('http://127.0.0.1:8000/api/customer/address/update/active/' + address_id, user_id, constants.routeApis.TOKEN);
      } catch (error) {
        return error
      }
    },
  }
})

export const useOrder = defineStore('order', {
  state: () => ({
    status: 0,
    allOrder: [],
    orderDetail: [],
  }),
  getters: {
    getStatus(state) {
      return state.status
    },

    getAllOrder(state) {
      return state.allOrder
    },

    getOrderDetail(state) {
      return state.orderDetail
    },
  },
  actions: {
    async fetchCreate(user_id:number, dataOrder:any) {
      try {
        const data = await axios.post('http://127.0.0.1:8000/api/customer/order/create/'+ user_id, dataOrder, constants.routeApis.TOKEN);
        this.status = data.status
      } catch (error) {
        this.status = error.response.status
      }
    },

    async fetchAll(user_id:number, status_id = 0) {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/order/all/'+ user_id + '/' + status_id, constants.routeApis.TOKEN);
        this.allOrder = data.data
      } catch (error) {
        return error
      }
    },

    async fetchOrderDetail(id:number) {
      try {
        const data = await axios.get('http://127.0.0.1:8000/api/customer/order/detail/'+ id, constants.routeApis.TOKEN);
        this.orderDetail = data.data
      } catch (error) {
        return error
      }
    },

    async updateStatus(order_id:number, reason:string) {
      try {
        await axios.post('http://127.0.0.1:8000/api/customer/order/update-status/' + order_id, reason, constants.routeApis.TOKEN)
      } catch (error) {
        return
      }
    }
    
  }
})