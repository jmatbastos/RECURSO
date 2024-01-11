<template>
	<!-- FOOTER -->
	<section class="w3l-footer-29-main">
		<div class="footer-29 ">
			<div class="container">

				<div class="d-grid grid-col-2 bottom-copies">
					<p class="copy-footer-29">© {{year}} Coffee. All rights reserved | Designed by <a href="https://w3layouts.com">W3layouts</a></p>

				</div>
			</div>
		</div>
		<!-- move top -->
		<button onclick="topFunction()" id="movetop" title="Go to top">
			<span class="fa fa-angle-up"></span>
		</button>
		<!-- /move top -->
	</section>
	<!-- /FOOTER -->
</template>

<script>
    export default {
        computed: {
            year: function () {
                return new Date().getFullYear()
            },
        }
    }  
</script>
