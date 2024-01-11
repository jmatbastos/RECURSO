<template>
<div>


  
<Header />



<!-- breadcrumbs -->

<!-- /breadcrumbs -->


<!-- contact-form -->

<!-- /contact-form -->



<Footer />

</div>
</template>
<script>
import Footer from '@/components/Footer.vue'
import Header from '@/components/Header.vue'

import { useBookingsStore } from '@/store/bookings'
import { useUserStore } from '@/store/user'

export default {
	setup() {
		const bookingsStore = useBookingsStore()
		const userStore = useUserStore()		
		return { bookingsStore, userStore }
  	},    
    components: {
        Footer,
        Header
    },
    data() {
        return {
            email: '',
            password: '', 
            alertMessageStyle: 'display:none;'      
        }
    },
    mounted() {
    
    },
    methods: {    
        onSubmit() {
 
        },

        async loginUser(user) {

		},

        hideAlertMessage: function () {
            this.alertMessageStyle = 'display: none;'
        },    
    },
    computed: {
        invalidEmail() {

        },
        invalidPassword() {

        },                        
    },
}
</script>