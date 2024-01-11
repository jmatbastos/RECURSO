<template >



		<section  class="w3l-booking-top">

			<!-- /form-16-section -->
			<div class="booking-form-61">
				<div class="container">

					<div class="text-center mb-5">
					
						<h1 style="color:white;margin-top:100px;">{{ message }}</h1>
					</div>

				</div>
			</div>
		</section>
	
</template>

<script>
export default {
    data() {
		return {
            message: '',
		}
	},   
    mounted() {
        this.message = localStorage.getItem('message')
        var timeleft = 3;
        var downloadTimer = setInterval(() => {
        if(timeleft <= 0){
            clearInterval(downloadTimer);
            this.$router.push('/menu')
        }
        timeleft -= 1;
        }, 1000);
	},

}
</script>

<style scoped>
</style>



