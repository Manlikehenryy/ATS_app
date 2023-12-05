<script setup>
import { RouterLink } from 'vue-router'
import Navbar from '../components/Navbar.vue';
</script>

<template>
     <Navbar/>
    <form v-if="showForm" class="container" style="box-shadow: 0 0 8px rgba(0,0,0,0.2); padding-top: 30px;padding-bottom: 30px; margin-bottom: 40px;">
     <div class="space-y-12">

      <div class="border-b border-gray-900/10 pb-12">
         <h2 class="text-base font-semibold leading-7 text-gray-900">Job Description</h2>
         
         

         <div ref="div" class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
           <div class="sm:col-span-6">
             <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Enter Job Description</label>
             <div class="mt-2">    
           <textarea required  cols="30" rows="5" autocomplete="given-name" v-model="formData.jobDescription"   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="" id=""></textarea>
             </div>
           </div>

         </div>
       </div>

        <div class="border-b border-gray-900/10 pb-12">
         <h2 class="text-base font-semibold leading-7 text-gray-900">Job Requirements</h2>
         
         

         <div ref="div" class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
           <div class="sm:col-span-6">
             <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Requirement 1</label>
             <div class="mt-2" style="display: flex;">
               <input required type="text" v-model="formData.values['dynamic-field-1']" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
               <div class="mx-6 flex items-center justify-end gap-x-6">
                     <button @click="addRequirement" type="button" style="background-color: rgb(74, 118, 180);" class="rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">Add </button>
                     <button @click="removeRequirement" type="button" style="background-color: rgb(74, 118, 180);" class="rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">Remove </button>

               </div>
             </div>
           </div>

           <div v-for="key in formData.values.count" :key="key" class="sm:col-span-6">
             <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Requirement {{key+1}}</label>
             <div class="mt-2" style="display: flex;">
               <input required type="text" v-model="formData.values[`dynamic-field-${key+1}` ]" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              
             </div>
           </div>

        
   
         </div>
       </div>

      
      
       <div class="border-b border-gray-900/10 pb-12">
         <h2 class="text-base font-semibold leading-7 text-gray-900">Job Information</h2>
   
         <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
           <div class="sm:col-span-3">
             <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
             <div class="mt-2">
               <input required type="text" placeholder="Django Developer" v-model="formData.title" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>
   
           <div class="col-span-full">
             <label for="skills" class="block text-sm font-medium leading-6 text-gray-900">Skills Required</label>
             <div class="mt-2">
               <input required type="text" placeholder="Laravel, React, Javascript" v-model="formData.skills" name="skills" id="skills" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>
   
           <div class="sm:col-span-3">
             <label for="mobile-number" class="block text-sm font-medium leading-6 text-gray-900">Degree</label>
             <div class="mt-2">
               <input type="text" placeholder="Computer Science, Computer Engineering" v-model="formData.bachelorDeg" name="mobile-number" id="mobile-number" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>
   
           <div class="sm:col-span-3">
             <label for="years-of-experience" class="block text-sm font-medium leading-6 text-gray-900">Certification</label>
             <div class="mt-2">
               <input type="text" placeholder="AWS Developer Associate, Full-stack developer" v-model="formData.certification" name="years-of-experience" id="years-of-experience" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>
           
           <div class="sm:col-span-3">
             <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Minimum Years of Experience</label>
             <div class="mt-2">
               <input type="number" placeholder="2" v-model="formData.yearsOfExp" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>

           <div class="sm:col-span-3">
             <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Pass Mark</label>
             <div class="mt-2">
               <input type="number" placeholder="80" v-model="formData.passMark" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
             </div>
           </div>
        
   
         </div>
       </div>

       <div class="border-b border-gray-900/10 pb-12">
         <h2 class="text-base font-semibold leading-7 text-gray-900">Job Keyword</h2>
         
         

         <div ref="div" class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
           <div class="sm:col-span-6">
             <label for="keyword" class="block text-sm font-medium leading-6 text-gray-900">Keyword 1</label>
             <div class="mt-2" style="display: flex;">
               <input required type="text" v-model="formData.values['keyword-field-1']" name="" id="" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
               <div class="mx-6 flex items-center justify-end gap-x-6">
                     <button @click="addKeyword" type="button" style="background-color: rgb(74, 118, 180);" class="rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 ">Add </button>
                     <button @click="removeKeyword" type="button" style="background-color: rgb(74, 118, 180);" class="rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">Remove </button>

               </div>
             </div>
           </div>

           <div v-for="key in formData.values.keywordcount" :key="key" class="sm:col-span-6">
             <label for="" class="block text-sm font-medium leading-6 text-gray-900">Keyword {{key+1}}</label>
             <div class="mt-2" style="display: flex;">
               <input required type="text" v-model="formData.values[`keyword-field-${key+1}` ]" name="" id="" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              
             </div>
           </div>

        
   
         </div>
       </div>
   
     
     </div>
   
     <div class="mt-6 flex items-center justify-end gap-x-6">
       <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
       <button @click="submitDetails" type="button" style="background-color: rgb(74, 118, 180);" class="rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">Save</button>
     </div>
   </form>
   <div style="padding: 100px; text-align: center; font-size: 32px; font-weight: bolder;" v-if="!showForm">
     <h2>Job created successfully!!</h2>
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
    
     data(){
     return {
       showForm: true,
       token:'',
       formData:{
        values: {
        'dynamic-field-1': '',
        count:0,
        keywordcount:0,
        'keyword-field-1': '',
       },
       title:'',
       yearsOfExp:'',
       bachelorDeg:'',
       certification:'',
       skills:'',
       jobDescription:'',
       passMark:''
       }
      
     }
     },
     methods:{
       async submitDetails(){
         // this.$refs.p.style.border = '3px solid red';
         this.formData.values.noOfReq = this.formData.values.count + 1;
         this.formData.values.noOfkeyword = this.formData.values.keywordcount + 1;
         console.log(this.formData)
          this.token = localStorage.getItem('token'); 
       
      await axios.post('http://127.0.0.1:8000/api/job',this.formData,{
        headers: {'Authorization': `Bearer ${this.token}`}
      }).then((res)=>{

       if (res.data.status=="success") {
         this.showForm = false;
        alert(res.data.message);
       }

      }).catch((err)=>{  console.log(err)}); 
       },

        addRequirement(){
        //  this.$refs.div.style.border = '3px solid red';
        // console.log(this.$refs.div);
        this.formData.values.count++
         
       },
       removeRequirement(){
        if (this.formData.values.count) {
          this.formData.values.count--
        }
        
       },
       addKeyword(){
        //  this.$refs.div.style.border = '3px solid red';
        // console.log(this.$refs.div);
        this.formData.values.keywordcount++
         
       },
       removeKeyword(){
        if (this.formData.values.keywordcount) {
          this.formData.values.keywordcount--
        }
        
       }

     }
   }
   </script>
   
 