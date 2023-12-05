<script setup>
import { RouterLink } from 'vue-router'
import Navbar from '../components/Navbar.vue';
</script>

<template>
     <Navbar/>
    <div style="margin-top: -100px;padding: 50px;margin: 50px auto ;box-shadow:  0 0 8px rgba(0,0,0,0.2);border-radius: 10px;padding:20px 50px 50px 50px; width: 60%;" v-if="job.title">
     <h2 style="font-size: 30px; font-weight: bolder;margin-bottom: 5px;">{{job.title}}</h2>
     <div style="display: flex;margin-bottom: 10px;">
        <div  style="background-color: rgb(29, 94, 185); color: #fff; width: 30px; height: 30px; text-align: center; padding-top: 3.5px; border-radius: 5px; margin-top: 4px;">{{job.company.substring(0,1).toUpperCase()}}</div>
        <h6 style="padding: 10px 5px;">{{job.company}}</h6>
     </div>
     <hr>
     <RouterLink :to="{name:'apply',params:{id:job.id}}">
        <button @click="submitDetails" type="button" style="margin: 10px;background-color: rgb(74, 118, 180);"  class="rounded-md  px-3 py-2 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">Apply Now</button>
        <!-- <button style="width: 100px;height:40px; background-color: aqua; margin: 10px;">Apply Now</button> -->
    </RouterLink>
    <hr>
      <h5 style="font-size: 20px; font-weight: bold;margin: 10px 0;">Job Description</h5>
     <p style="margin-bottom: 20px;">{{job.job_description}}</p>
     <h5 style="font-size: 20px; font-weight: bold;margin-bottom: 10px;">Job Requirement</h5>
     <ul style="padding-left: 15px;">
        <li style="list-style: disc;" v-for="key in job.requirements.noOfReq">{{job.requirements[`dynamic-field-${key}`]}}</li>
     </ul>

   
   
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data(){
        return{
         job:{}
        }
    },
    mounted(){
     this.getJob();    
    },
    methods:{
        async getJob(){
     
       
     await axios.get(`http://127.0.0.1:8000/api/job/${this.$route.params.id}`).then((res)=>{

      if (res.data.status=="success") {
       this.job = res.data.data
       console.log(res.data.data)
      }

     }).catch((err)=>{  console.log(err)}); 
      },
      test(res){
        console.log(res)
      }
    }
}

</script>

<style lang="scss" scoped>

</style>