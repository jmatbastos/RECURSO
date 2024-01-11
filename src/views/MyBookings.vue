<template>
    <div>
        <Header />

        <!-- breadcrumbs -->

        <!-- /breadcrumbs -->

        <!-- bookings block -->

        <!-- bookings block -->



        <Footer />

    </div>
</template>

<script>
import Footer from '@/components/Footer.vue'
import Header from '@/components/Header.vue'

import { useBookingsStore } from '@/store/bookings'

export default {
	setup() {
		const bookingsStore = useBookingsStore()	
		return { bookingsStore }
  	}, 
    components: {
		Footer,
        Header
	},
	data() {
		return {
		}
	},
	mounted() {
	},
	methods: {      
	 		
	},
    computed: {
		bookings() {

		}

    },
}
</script>

<style scoped>
</style>