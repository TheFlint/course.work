import Vue from 'vue'
import Router from 'vue-router'
import Meta from 'vue-meta'
import Vuetify from 'vuetify'
import * as Auth from '@/components/pages/Authentication'

import Home from '@/components/pages/Home/Home'
import HelloWorld from '@/components/HelloWorld'
import Authentication from '@/components/pages/Authentication/Authentication'

Vue.use(Router)
Vue.use(Vuetify)
Vue.use(Meta)

const router = new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/login',
      name: 'Authentication',
      component: Authentication
    },
    {
      path: '/HelloWorld',
      name: 'HelloWorld',
      component: HelloWorld
    }

  ]
})
// router.beforeEach((to, from, next) => {
//   if (to.meta.requiredAuth) {
//     if (Auth.default.user.authenticated) {
//       next()
//     } else {
//       router.push('/login')
//     }
//   } else {
//     next()
//   }
// })

export default router
