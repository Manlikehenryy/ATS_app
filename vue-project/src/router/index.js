import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AllApplicantsView from '../views/AllApplicantsView.vue'
import ApplicantView from '../views/ApplicantView.vue'
import ApplyView from '../views/ApplyView.vue'
import AddJobView from '../views/AddJobView.vue'
import RegisterView from '../views/RegisterView.vue'
import LoginView from '../views/LoginView.vue'
import JobView from '../views/JobView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/apply/:id',
      name: 'apply',
      component: ApplyView,
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      // component: () => import('../views/AboutView.vue')
    },
    {
      path:'/view-all-applications',
      name: 'applications',
      component: AllApplicantsView
    },
    {
      path:'/applicant/:id',
      name: 'applicant',
      component: ApplicantView
    },
    {
      path:'/add-job-posting',
      name: 'jobPosting',
      component: AddJobView
    },
    {
      path:'/register',
      name: 'register',
      component: RegisterView
    },
    {
      path:'/login',
      name: 'login',
      component: LoginView
    },
    {
      path:'/job/:id',
      name: 'viewJob',
      component: JobView
    },
  ]
})

export default router
