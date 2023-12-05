<template>
     <Navbar/>
     <div  style="padding:40px 50px 50px 50px; width: 60%;margin: 50px auto ;box-shadow:  0 0 8px rgba(0,0,0,0.2);border-radius: 10px;">
  <div class="px-4 sm:px-0">
    <h3 class="text-base font-semibold leading-7 text-gray-900">Applicant Information</h3>
    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
  </div>
  <div class="mt-6 border-t border-gray-100">
    <dl class="divide-y divide-gray-100">
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Update status</dt>
        <select @change="updateStatus" v-model="statusId" name="" id="">
        <option value="Qualified">Qualified</option>
        <option value="Failed">Failed</option>
        <option value="Selected">Selected</option>
        <option value="Rejected">Rejected</option> 
      </select>  
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{applicant.first_name}} {{applicant.last_name}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Application for</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ applicant.job_title }}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Mobile number</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{applicant.mobile_no}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Email address</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{applicant.email}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Years of experience</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{applicant.years_of_exp}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Skills</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{applicant.skills}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Score</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{applicant.score}}%</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Degree</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{applicant.bachelor_deg}}</dd>
      </div>

      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Certification</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{applicant.certification}}</dd>
      </div>

      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Attachments</dt>
        <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
          <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
              <div class="flex w-0 flex-1 items-center">
                <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                </svg>
                <div class="ml-4 flex min-w-0 flex-1 gap-2">
                  <span class="truncate font-medium">{{applicant.file_name}}</span>
                  <span class="flex-shrink-0 text-gray-400">2.4mb</span>
                </div>
              </div>
              <div class="ml-4 flex-shrink-0">
                
                <a v-bind:href="applicant.file_path"  target="_blank" style="color: rgb(61, 121, 204);" class="font-medium">Download</a>
              </div>
            </li>
           
          </ul>
        </dd>
      </div>
    </dl>
  </div>
</div>

</template>

<script>
import axios from 'axios';
import { RouterLink } from 'vue-router';
import Navbar from '../components/Navbar.vue';

 export default{
    data() {
        return {
            applicant: {},
            token:'',
            file: {
                "file1":""
            },
            statusId:''
        };
    },
    components: { RouterLink,Navbar },
    async mounted(){
      
      this.token = localStorage.getItem('token'); 
     await axios.get(`http://127.0.0.1:8000/api/get/applicant?applicantId=${this.$route.params.id}`,{
        headers: {'Authorization': `Bearer ${this.token}`}
      }).then((res)=>{
        this.applicant = res.data.data 
        this.statusId = res.data.data.status 
        console.log( res.data)}).catch((err)=>{console.log(err)})
    },
    methods:{
        async updateStatus(){
            this.token = localStorage.getItem('token'); 
            await axios.get(`http://127.0.0.1:8000/api/applicant/status?statusId=${this.statusId}&applicantId=${this.$route.params.id}`,{
        headers: {'Authorization': `Bearer ${this.token}`}
      }).then((res)=>{
       if (res.data.status=="success") {
        alert(res.data.message);
       }
        console.log( res.data)}).catch((err)=>{console.log(err)})
    }
      
    }

}
</script>

<style lang="scss" >

</style>