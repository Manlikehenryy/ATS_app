<script setup>
import { RouterLink } from 'vue-router'
import Navbar from '../components/Navbar.vue';
</script>

<template>
     <Navbar/>
    <form v-if="showForm" class="container" style="box-shadow: 0 0 8px rgba(0,0,0,0.2); padding-top: 30px;padding-bottom: 30px; margin-bottom: 40px;">
     <div class="space-y-12">
       <!-- <div class="border-b border-gray-900/10 pb-12" >
         <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
         <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>
   
         <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
           <div class="sm:col-span-4">
             <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
             <div class="mt-2">
               <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                 <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span>
                 <input type="text" name="username" id="username" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="janesmith">
               </div>
             </div>
           </div>
   
           <div class="col-span-full">
             <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
             <div class="mt-2">
               <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
             </div>
             <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
           </div>
   
           <div class="col-span-full">
             <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
             <div class="mt-2 flex items-center gap-x-3">
               <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                 <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
               </svg>
               <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
             </div>
           </div>
   
           <div class="col-span-full">
             <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>
             <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
               <div class="text-center">
                 <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                   <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                 </svg>
                 <div class="mt-4 flex text-sm leading-6 text-gray-600">
                   <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                     <span>Upload a file</span>
                     <input id="file-upload" name="file-upload" type="file" class="sr-only">
                   </label>
                   <p class="pl-1">or drag and drop</p>
                 </div>
                 <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
               </div>
             </div>
           </div>
         </div>
       </div> -->
   
       <div class="border-b border-gray-900/10 pb-12">
         <h2 class="text-base font-semibold leading-7 text-gray-900">Application Information</h2>
         <!-- <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p> -->
   
         <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
           <div class="sm:col-span-3">
             <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
             <div class="mt-2">
               <input required type="text" placeholder="John" v-model="firstName" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>
   
           <div class="sm:col-span-3">
             <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
             <div class="mt-2">
               <input required type="text" placeholder="Doe" v-model="lastName" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>
   
           <div class="sm:col-span-3">
             <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
             <div class="mt-2">
               <input required  id="email" v-model="email" placeholder="example@gmail.com" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>
   
           <div class="sm:col-span-3">
             <label for="mobile-number" class="block text-sm font-medium leading-6 text-gray-900">Mobile number</label>
             <div class="mt-2">
               <input required type="text" placeholder="09088811334" v-model="mobileNumber" name="mobile-number" id="mobile-number" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>
   
           <div class="sm:col-span-3">
             <label for="years-of-experience" class="block text-sm font-medium leading-6 text-gray-900">Years of experience</label>
             <div class="mt-2">
               <input required type="number" v-model="yearsOfExp" placeholder="2" name="years-of-experience" id="years-of-experience" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
   
               <!-- <select id="" name="years-of-experience" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                 <option>United States</option>
                 <option>Canada</option>
                 <option>Mexico</option>
               </select> -->
             </div>
           </div>
   
           <div class="col-span-full">
             <label for="skills" class="block text-sm font-medium leading-6 text-gray-900">Skills</label>
             <div class="mt-2">
               <input required type="text" placeholder="Laravel, React, Javascript" v-model="skills" name="skills" id="skills" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>
   
           <div class="col-span-full">
             <label for="skills" class="block text-sm font-medium leading-6 text-gray-900">Certification</label>
             <div class="mt-2">
               <input required type="text" placeholder="AWS Developer Associate, Nodejs" v-model="certification" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>

           <div class="col-span-full">
             <label for="Bachelors degree" class="block text-sm font-medium leading-6 text-gray-900">degree</label>
             <div class="mt-2">
               <input required type="text" placeholder="Computer science, Computer Engineering" v-model="bachelordeg" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>

           <div class="col-span-full">
             <label for="Resume" class="block text-sm font-medium leading-6 text-gray-900">Resume/CV (pdf)</label>
             <div class="mt-2">
               <input required type="file" ref="file" v-on:change="getFile()" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>
         </div>
       </div>
     </div>
   
     <div class="mt-6 flex items-center justify-end gap-x-6">
       <button @click="submitDetails" type="submit" style="background-color: rgb(74, 118, 180);" class="rounded-md  px-3 py-2 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">Apply</button>
     </div>
   </form>
   
   <div style="padding: 100px; text-align: center; font-size: 32px; font-weight: bolder;" v-if="!showForm">
     <h2>You have successfully applied!!</h2>
     <h2>View more jobs</h2>
     <RouterLink :to="{name: 'home'}">
  
 
      <div class="text-center">
      
        <div class="mt-10 flex items-center justify-center gap-x-6">
          <div style="background-color: rgb(74, 118, 180);" class="rounded-md px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 ">View Jobs</div>
      
        </div>
     
      </div>
  
 </RouterLink>
   </div>
   </template>
   
   <script>
   import axios from "axios";
   
    export default {
     name: 'HomeView',
     data(){
     return {
      showForm: true,
       
       firstName : '',
       lastName: '',
       email: '',
       mobileNumber :'',
       yearsOfExp:'',
       skills: '',
       resume:'',
       jobId:'',
       certification:'',
       bachelordeg:''
     }
     },
     methods:{
       async submitDetails(e){
        e.preventDefault();
         // this.$refs.p.style.border = '3px solid red';
         this.jobId = this.$route.params.id;
         let form = new FormData()
         form.append('firstName',this.firstName);
         form.append('lastName',this.lastName);
         form.append('email',this.email);
         form.append('mobileNumber',this.mobileNumber);
         form.append('yearsOfExp',this.yearsOfExp);
         form.append('skills',this.skills);
         form.append('resume',this.resume);
         form.append('jobId',this.jobId);
         form.append('certification',this.certification);
         form.append('bachelordeg',this.bachelordeg);

      await axios.post('http://127.0.0.1:8000/api/access/applicant',form).then((res)=>{
       
        if (res.data.status=="success") {
        console.log(res.data);
        alert(res.data.message)
         this.showForm = false;
       }
      }).catch((err)=>{console.log(err)}); 
       },
       getFile(){
        this.resume = this.$refs.file.files[0];
       }
     }
   }
   </script>
   
   <style scoped>
   input{
     padding: 10px;
   }
   </style>