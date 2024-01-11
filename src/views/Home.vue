<template>







</template>

<script>

import { useBeveragesStore } from '@/store/beverages'
import { useCategoriesStore } from '@/store/categories'

export default {

	setup() {
		const beveragesStore = useBeveragesStore()
		const categoriesStore = useCategoriesStore()		
		return { beveragesStore, categoriesStore }
  	},

    components: {
    },
   
    mounted() {

    },

}






</script>
<!-- //script -->

<style scoped>
</style>