<template>
<div>


  


</div>
</template>

<script>
import { useBookingsStore } from '@/store/bookings'
import { useUserStore } from '@/store/user'

export default {
    name: 'book',
	setup() {
		const bookingsStore = useBookingsStore()
		const userStore = useUserStore()		
		return { bookingsStore, userStore }
  	},
    data() {
        return {
            phone: '',
            n_persons: '',
            date: '', 
            time: ''      
        }
    },
    computed: {
        client_id() {

        },
        invalidPhone() {

        },
    },
    methods: { 
        onSubmit() {

 
        },
        async makeReservation(reservation) {
          //reservation = {
          //phone: "9999999999",
          //n_persons: "2",
          //date: "2021-12-03",
          //time: "18:20:31",
          //client_id: "1"
          //} 
		},
    }
}
</script>

<style scoped>

</style>