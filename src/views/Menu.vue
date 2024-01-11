<template>
    <div>


    
        <Header />


        <!-- breadcrumbs -->

        <!-- /breadcrumbs -->


        <!-- menu block -->


                <!-- Section starts: COFFEE -->

                <!-- Section ends: COFFEE -->

                <!-- Section starts: HOT BEVERAGES -->

                <!-- Section ends: HOT BEVERAGES -->

                <!-- Section starts: COLD BEVERAGES -->

                <!-- Section ends: COLD BEVERAGES -->



        <!-- menu block -->




        <Footer />

    </div>
</template>

<script>

import Footer from '@/components/Footer.vue'
import Header from '@/components/Header.vue'

import { useBeveragesStore } from '@/store/beverages'
import { useCategoriesStore } from '@/store/categories'

export default {

    setup() {
		const beveragesStore = useBeveragesStore()
        const categoriesStore = useCategoriesStore()		
		return { beveragesStore, categoriesStore}
  	},
      data() {
        return {
            
        }
    }, 

    components: {
        Footer,
        Header
    },
    methods: {


    },

    computed: {
        categories() {

        },
        coffee() {

        },
        hot() {

        },
        cold() {

        },        
    },

    mounted() {

    },
}

</script>

<style scoped>

</style>