import { defineStore } from 'pinia'
import axios from 'axios'
export const useAuthStore = defineStore('auth', {
  state: () => ({
    status: 0,
    error: [],
    token: [],
    tokenAdmin: [],
    user_id: null
  }),
  getters: {
    getError(state) {
      return state.error
    },
    getStatus(state) {
      return state.status
    },

    getId(state) {
      return state.user_id
    }
  },
  actions: {
    async fetchLogin(dataLogin: any) {
      try {
        await axios
          .post('http://127.0.0.1:8000/api/login', dataLogin)
          .then((res) => {
            this.token = res.data.token
            localStorage.setItem('token', this.token)
            this.status = res.status
          })
          .catch((error) => {
            this.status = error.response.status
          })
      } catch (error) {
        return
      }
    },
    async fetchLoginAdmin(dataLogin: any) {
      try {
        const res = await axios.post('http://127.0.0.1:8000/api/login', dataLogin)
        if(res.data.role_id === 1) {
            localStorage.setItem('token-admin', res.data.token)
        }
      } catch (error) {
        return
      }
    },
    async fetchRegister(dataRegister: any) {
      try {
        await axios
          .post('http://127.0.0.1:8000/api/register', dataRegister)
          .then((res) => {
            this.status = res.status
          })
          .catch((error) => {
            this.status = error.response.status
          })
      } catch (error) {
        return
      }
    },

    async sendEmail(email:any) {
      try {
        const res = await axios.post('http://127.0.0.1:8000/api/check-email', email)
        this.status = res.status
      } catch (error) {
        this.status = error.response.status
      }
    },

    async checkToken(token:number) {
      try {
        const res = await axios.post('http://127.0.0.1:8000/api/check-token', token)
        this.user_id = res.data
        this.status = res.status
      } catch (error) {
        this.status = error.response.status
      }
    },

    async changePassword(user_id:number,password:any) {
      try {
        const res = await axios.post('http://127.0.0.1:8000/api/change-password/' + user_id, password)
        this.status = res.status
      } catch (error) {
        this.status = error.response.status
      }
    }
  }
})
