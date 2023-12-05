
<template>
     <Navbar/>
    <div  style="padding:20px 50px 50px 50px; width: 60%;margin: 50px auto ;box-shadow:  0 0 8px rgba(0,0,0,0.2);border-radius: 10px;">
    <div style="display: flex; justify-content: space-between;margin-bottom: 15px;">
      <div>
      <label style="margin-right:15px ;" for="Filter">Filter by Job:</label>
      <select @change="filterApplicants" v-model="jobId" name="" id="">
        <option  value="All">Default</option>
        <option v-for="job in jobs" :key="job.id" :value="job.id" :label="job.title">{{job.title}}</option>
      </select>  
     </div>

     <div>
      <label style="margin-right:15px ;" for="Filter">Filter by Status:</label>
      <select @change="filterApplicants" v-model="statusId" name="" id="">
        <option value="All">Default</option>
        <option value="Qualified">Qualified</option>
        <option value="Failed">Failed</option>
        <option value="Selected">Selected</option>
        <option value="Rejected">Rejected</option> 
      </select>  
     </div>
    </div>
      <ul v-if="showList" role="list" class="divide-y divide-gray-100">

          <div v-for="applicant in applicants" :key="applicant.id">
            <RouterLink :to="{name: 'applicant', params:{id:applicant.id}}">
        <li class="flex justify-between gap-x-6 py-5">
    <div class="flex min-w-0 gap-x-4">
      <div  style="background-color: rgb(97, 138, 194); color: #fff; width: 30px; height: 30px; text-align: center; padding-top: 3.5px; border-radius: 50%; margin-top: 4px;">{{applicant.first_name.substring(0,1).toUpperCase()}}</div>
      <div class="min-w-0 flex-auto">
        <p class="text-sm font-semibold leading-6 text-gray-900">   {{ applicant.job_title }} </p>
        <p class="text-sm font-semibold leading-6 text-gray-900" style="font-size: 13px;">{{applicant.first_name}} {{applicant.last_name}}</p>
        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{applicant.email}}</p>
      </div>
    </div>
    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
      <p class="mt-1 text-xs leading-5 text-gray-500">{{applicant.created_at.substring(0,10)}}</p>
      <div class="mt-1 flex items-center gap-x-1.5">
        <div v-if="applicant.status!='Failed'&&applicant.status!='Rejected'" class="flex-none rounded-full bg-emerald-500/20 p-1">
          <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
        </div>
        <div v-if="applicant.status=='Failed'||applicant.status=='Rejected'" class="flex-none rounded-full p-1" style="background-color: rgb(250, 218, 218);">
          <div class="h-1.5 w-1.5 rounded-full" style="background-color: rgb(249, 80, 80);"></div>
        </div>
        <p class="text-xs leading-5 text-gray-500">{{applicant.status}}</p>
      </div>
      <p  style=" color: rgb(74, 118, 180); padding: 3px; font-weight: bold;" class="mt-1 text-xs leading-5 text-gray-500">{{applicant.score}}%</p>
     
     
    </div>
  </li>
    </RouterLink>
          </div>
      </ul>

      <div v-if="!showList" style="padding: 100px; text-align: center; font-size: 32px; font-weight: bolder;">
     <h2>No Results!!</h2>
   </div>

    </div> 
</template>

<script>
import axios from 'axios';
import { RouterLink } from 'vue-router';
import Navbar from '../components/Navbar.vue';

 export default{
    name: 'ViewAllApplicants',
    data() {
        return {
            applicants: [],
            token:'',
            jobs:[],
            jobId:"All",
            statusId:"All",
            showList:true,
        };
    },
    components: { RouterLink,Navbar },
    async mounted(){
      this.token = localStorage.getItem('token'); 
     await axios.get(`http://127.0.0.1:8000/api/get/applicants?jobId=${this.jobId}&statusId=${this.statusId}`,{
        headers: {'Authorization': `Bearer ${this.token}`}
      }).then((res)=>{
        this.applicants = res.data.data.applicants 
        if (this.applicants.length == 0) {
          this.showList = false;
        }
        else{
          this.showList = true;
        }
        this.jobs = res.data.data.jobs 
        console.log( this.applicants)}).catch((err)=>{console.log(err)})
    },
    methods:{
     async filterApplicants(){
      await axios.get(`http://127.0.0.1:8000/api/get/applicants?jobId=${this.jobId}&statusId=${this.statusId}`,{
        headers: {'Authorization': `Bearer ${this.token}`}
      }).then((res)=>{
        this.applicants = res.data.data.applicants 
        if (this.applicants.length == 0) {
          console.log( this.applicants)
          this.showList = false
        }
        else{
          this.showList = true;
        }
        this.jobs = res.data.data.jobs 
        }).catch((err)=>{console.log(err)})  
      }
    }

}
</script>

<style scoped>
ul>div>a>li:hover{
  background-color: #f2f2f2;
}
ul>div>a>li{
  padding: 10px;
  border-radius: 7px;
}
</style>