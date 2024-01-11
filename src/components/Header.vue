 <template>
<!--HEADER-->
<header id="site-header" class="fixed-top">
  <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark stroke" >
          <a class="navbar-brand" href="#">
              <span class="fa fa-coffee"></span> Coffee
          </a>

          <button class="navbar-toggler collapsed bg-gradient" type="button" data-toggle="collapse"
              data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
              <span class="navbar-toggler-icon fa icon-close fa-bars"></span>
          </button>

          <div class="collapse navbar-collapse" style="" id="navbarTogglerDemo02">
              <ul v-if="userIsEmpty"  class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <router-link  class="nav-link" to="/menu">Menu</router-link>
                  </li>                 
                  <li class="nav-item">
                    <router-link  class="nav-link" to="/register">Register</router-link>
                </li> 
                <li class="nav-item">
                    <router-link  class="nav-link" to="/login">Login</router-link>
                </li>                                  
              </ul>


              <ul v-else class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <router-link  class="nav-link" to="/menu">Menu</router-link>
                  </li>
                  <li class="nav-item">
                      <router-link  class="nav-link" to="/book">Book a table</router-link>
                  </li>
                  <li class="nav-item">
                    <router-link  class="nav-link" to="/mybookings">My Bookings</router-link>
                </li>                   
                <li class="nav-item ">
					<li><a class="nav-link" @click.prevent="logout" href="/logout">Logout</a></li>
                </li> 
                <li class="nav-item ">
					<li><router-link class="nav-link" to="#">Welcome {{userName}}</router-link></li>  
                </li> 				 
                              
              </ul>

          </div>
          <!-- toggle switch for light and dark theme -->
          <div class="mobile-position">
              <nav class="navigation">
                  <div class="theme-switch-wrapper">
                      <label class="theme-switch" for="checkbox">
                          <input type="checkbox" id="checkbox" onchange="switchTheme(event)">
                          <div class="mode-container py-1">
                              <i class="gg-sun"></i>
                              <i class="gg-moon"></i>
                          </div>
                      </label>
                  </div>
              </nav>
          </div>
          <!-- //toggle switch for light and dark theme -->
      </nav>
  </div>
</header>
<!--/HEADER-->
</template>

<script>

import { useUserStore } from '@/store/user'

export default {

	data() {
        return {
            active: [],       
        }
    },

	setup() {
		const userStore = useUserStore()
		return { userStore }
  	},

    methods: {
        logout() {
            localStorage.setItem('message', `Bye ${this.userStore.getUser.name}, see you back soon!`);
            this.userStore.logoutUser()        
            this.$router.push('/message')
        },

    },
    computed: {
        userIsEmpty() {
            let obj = this.userStore.getUser
            return Object.keys(obj).length === 0;
        },
        userName() {
            return this.userStore.getUser.name
        },

    },
	mounted() {

    },

}

// this is a patch to the bootstrap navbar ...
window.onresize = function() {
    if ($(window).width() < 977) {
        $('#navbarTogglerDemo02').attr("style", "background-color: black;");
    }
    if ($(window).width() > 977) {
        $('#navbarTogglerDemo02').attr("style", "");
    }
}






</script>  
