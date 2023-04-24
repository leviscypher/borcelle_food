import { defineStore } from 'pinia'
import axios from 'axios'

export const useProduct = defineStore('product', {
    state: () => ({
      products: [],
    }),
    getters: {
      getProduct(state) {
        return state.products
      },
     
    },
    actions: {
      async fetchProduct(page = 1) {
        try {
          const data = await axios.get('http://127.0.0.1:8000/api/customer/get/product/all?page=' + page)
          this.products = data.data;
        } catch (error) {
          return error;
        }
      },
    },
  })