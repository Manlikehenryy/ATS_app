<script setup>
import Navbar from '../components/Navbar.vue';
</script>



<template>
  <Navbar/>
<div style="margin-top: -100px;" class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <!-- <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> -->
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create an account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="#" @submit.prevent="registerUser()">
      <div>
        <label for="company" class="block text-sm font-medium leading-6 text-gray-900">Company Name</label>
        <div class="mt-2">
          <input id="" v-model="formData.company" name="" type="text" autocomplete="company" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

        <div>
        <label for="first name" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
        <div class="mt-2">
          <input id="" v-model="formData.firstName" name="" type="text" autocomplete="first name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <label for="last name" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
        <div class="mt-2">
          <input id="" v-model="formData.lastName" name="" type="text" autocomplete="last name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" v-model="formData.email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <!-- <div class="text-sm">
            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
          </div> -->
        </div>
        <div class="mt-2">
          <input id="password" v-model="formData.password" name="password" type="password" autocomplete="current-password"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
          <!-- <div class="text-sm">
            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
          </div> -->
        </div>
        <div class="mt-2">
          <input id="password" v-model="formData.confirmPassword" name="" type="password" autocomplete="current-password"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit"  style="background-color: rgb(74, 118, 180);" class="flex w-full justify-center rounded-md  px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">Sign up</button>
      </div>
    </form>

   
  </div>
</div>

</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
               formData:{
                email:"",
                firstName:"",
                lastName:"",
                password:"",
                passwordConfirmation:"",
                company:""
               }
            }
        },
        mounted() {
        //     this.$router.push({
        //     name: "login"
        // })
        },
        methods: {
        async registerUser (){
  
    try {
      console.log(this.formData)
     const response = await axios.post("http://127.0.0.1:8000/api/register/user",this.formData)
    console.log(response)
     if (response.data.status="success") {
        this.$router.push({
            name: "login"
        })
     }
    } catch (error) {
      console.log(error)
        // if (error.response.data.message.substring(54,69) == "Duplicate entry") {
        //     const message = "Email already exists";
        // }
        // else if(error.response.data.validation_error){
        //     const errors = error.response.data.validation_error;
        // }
        // else{
        //     const message = error.response.data.message;
        // }
    }
   
}
        }
    }


   






</script>

