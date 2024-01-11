 import { defineStore } from 'pinia'

export const useBeveragesStore = defineStore({
  id: 'beverages',
  state: () => ({
    beverages: [
    //{
    //"id":"1",
    //"name":"Single Cup Brew",
    //"cat_id":"1",
    //"cat_name":"Coffee",
    //"description":"Fresh Brewed coffee and steamed milk",     
    //"image":"middle.pn",
    //"price": "20"
    //},
    ]
  }),
  getters: {
    getbeverages (state) {
      return state.beverages;
    },
    getBeveragesByCat: (state) => (id) => {
      const results = state.beverages.filter(b => {
          return b.cat_id == id;
      })
      return results
    }, 

    getBeverageByID: (state) => {
        return (id) => state.beverages.filter((b) => b.id === id)
    },  
    
  }, 
  actions: {
    addbeverages(beverages){
      this.beverages = beverages
    },  
    async getBeveragesDB() {
            try {
                const response = await fetch('http://daw.deei.fct.ualg.pt/~a555554/api/beverages.php')
                const data = await response.json()
                console.log('received data:', data)                
                this.addbeverages(data)
                return true
            } 
            catch (error) {
                console.log('error: ', error)
                return false
            }
        },
  },
})