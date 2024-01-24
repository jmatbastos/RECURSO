import { defineStore } from 'pinia'

export const useBookingsStore = defineStore({
  id: 'bookings',
  state: () => ({
    bookings: 
    [
    //{
    //"id":"11",
    //"created_at":"2021-12-03 18:20:31", 
     //"date":"2021-12-03",
     //"time":"18:20:31",   
     //"n_persons":"2",
     //"client_id":"1",
     //"phone":"9999999999",
    //}
    ]
  }),
  getters: {
    getbookings (state) {
      return state.bookings
    },   
  }, 
  actions: {
    addbookings(bookings){
      this.bookings = bookings
    },
    newBooking(order){
      this.bookings = [order, ...this.bookings]
    },  
    async getMybookingsDB(client_id) {
            try {
                const response = await fetch(`http://daw.deei.fct.ualg.pt/~a12345/RECURSO/api/bookings.php?client_id=${client_id}`)
                const data = await response.json()
                console.log('received data:', data)                
                this.addbookings(data)
                return true
            } 
            catch (error) {
              console.log('error: ', error)
              return false
            }
        },
    async newBookingDB(newBooking) {
          //newBooking = {
          //phone: "9999999999",
          //n_persons: "2",
          //date: "2021-12-03",
          //time: "18:20:31",
          //client_id: "1"
          //}        
          try {
              const response = await fetch('http://daw.deei.fct.ualg.pt/~a12345/RECURSO/api/bookings.php', {
                  method: 'POST',
                  body: JSON.stringify(newBooking),
                  headers: { 'Content-type': 'text/html; charset=UTF-8' },
              })
              const data = await response.json()
              console.log('received data:', data)
              this.newBooking(data)
              return true
          } 
          catch (error) {
              console.error(error)
              return false
          }
      },     
  },
})
