<template>
    <div class="">

<div class="row justify-content-center">
  <div class="col-12 col-md-9 border rounded p-1 px-2 mt-3">

    <div class="row">

      <div class="col-6 pb-2 col-sm text-secondary">
      <label for="">Select Report:</label>
      <select @change="report" v-model.number="reportChoice" class="" name="" id="">
        <option value="1" selected="">Added Patients</option>
        <option value="2" selected="">Added Medicines</option>
        <option value="3">Released Medicines</option>
        <option value="4">Blood Pressure</option>
        <option value="5">Check-up</option>
        <option value="6">Immunization</option>
        <option value="7">Prenatal</option>
        
      </select>
    </div>

    <div class="col-6 pb-2 col-sm text-secondary">
      <label for="">Timeframe:</label>
      <select @change="report" v-model.number="tfChoice" class="" name="" id="">
        <option value="1">Today</option>
        <option value="2">Yesterday</option>
        <option value="3">This Week</option>
        <option value="4">This Month</option>
        <option value="5">This Year</option>
        <option value="6">Last 30 days</option>
        <option value="7">Last 365 days</option>
        <option value="8">All Records</option>
      </select>
    </div>

    <div class="col-6 pb-2 col-sm text-secondary">
      <label for="">Print Report:</label>
      <button :class="{'btn-outline-success': isDisabled }" class="btn-md btn-success" @click="generateReport" :disabled='isDisabled'>Print</button>
    </div>

    </div>

  </div>
</div>

<div v-if="reportChoice == 1" ref="printable" id="printable" class="row mt-1  text-break justify-content-center pb-4">
    <div class="text-white shadow-sm p-2 col-12 col-md-9">
    
  <table class="table text-secondary table-hover">

    <tr class="bg-primadry text-lisght">
      <th class="p-2">First Name</th>
      <th class="p-2">Middle Name</th>
      <th class="p-2">Last Name</th>
      <th class="p-2">Birthdate</th>
      <th class="p-2">Age</th>
      <th class="p-2">Contact Number</th>
    </tr>
    
    <tr v-for="patients in data" :key="patients.id">
        
        <td class="p-2">{{ patients.firstname }}</td>
        
        <td class="p-2">{{ patients.middlename }}</td>
        
        <td class="p-2">{{ patients.lastname }}</td>

        <td class="p-2">{{ patients.birthdate }}</td>

        <td class="p-2">{{ patients.age }}</td>

        <td class="p-2">0{{ patients.contact }}</td>

    </tr>

      <caption class="text-center" v-if="Object.keys(data).length === 0">No data</caption>
    
  </table>
  
    </div>
  </div>

  <div v-if="reportChoice == 2" ref="printable" id="printable" class="row mt-1  text-break justify-content-center pb-4">
    <div class="text-white shadow-sm p-2 col-12 col-md-9">
    
  <table class="table text-secondary table-hover">

    <tr class="bg-primadry text-lisght">
      <th class="p-2">Medicine Name</th>
      <th class="p-2">Medicine Type</th>
      <th class="p-2">Quantity</th>
      <th class="p-2">Date Received</th>
    </tr>
    
    <tr v-for="medicine in data" :key="medicine.id">
        
        <td class="p-2">{{ medicine.med_name }}</td>
        
        <td class="p-2">{{ medicine.med_type }}</td>
        
        <td class="p-2">{{ medicine.quantity }}</td>

        <td class="p-2">{{ medicine.date_received }}</td>

    </tr>

      <caption class="text-center" v-if="Object.keys(data).length === 0">No data</caption>
    
  </table>
  
    </div>
  </div>

  <div v-else-if="reportChoice == 3" ref="printable" id="printable" class="row mt-1  text-break justify-content-center pb-4">
    <div class="text-white shadow-sm p-2 col-12 col-md-9">
    
  <table class="table text-secondary table-hover">

    <tr class="bg-primadry text-lisght">
      <th class="p-2">Receiver's Name</th>
      <th class="p-2">Medicine Name</th>
      <th class="p-2">Quantity</th>
      <th class="p-2">Date Received</th>
    </tr>
    
    <tr  v-for="releasemed in releasemeds" :key="releasemed.id">
        
        <td v-for="profile in releasemed.profile" :key="profile.id" class="p-2">{{ profile.lastname }}, {{ profile.firstname }} {{ profile.middlename }}</td>

        <td class="p-2">{{ releasemed.med_name }}</td>

        <td v-for="pivot in releasemed.profile" :key="pivot.pivot.id"  class="p-2">{{ pivot.pivot.quantity }}</td>

        <td class="p-2">{{ releasemed.date_received }}</td>
        
    </tr>

    <caption class="text-center" v-if="Object.keys(releasemeds).length === 0">No data</caption>
   
  </table>
  
    </div>
  </div>

  <div v-else-if="reportChoice == 4" ref="printable" id="printable" class="row mt-1  text-break justify-content-center pb-4">
    <div class="text-white shadow-sm p-2 col-12 col-md-9">
    
  <table class="table text-secondary table-hover">

    <tr class="bg-primadry text-lisght">
      <th class="p-2">Last Name</th>
      <th class="p-2">First Name</th>
      <th class="p-2">Middle Name</th>
      <th class="p-2">Blood Pressure</th>
    </tr>
   
    <tr v-for="blood in bloods" :key="blood.id">
        
        <td class="p-2 text-lowercase">{{ blood.profile.lastname }}</td>
        
        <td class="p-2 text-lowercase">{{blood.profile.firstname }}</td>
        
        <td class="p-2 text-lowercase">{{ blood.profile.middlename }}</td>

        <td class="p-2 text-lowercase">{{ blood.sp}} / {{ blood.dp }}</td>
        
    </tr>

    <caption class="text-center" v-if="Object.keys(bloods).length === 0">No data</caption>
   
  </table>
  
    </div>
  </div>

  <div v-else-if="reportChoice == 5" ref="printable" id="printable" class="row mt-1  text-break justify-content-center pb-4">
    <div class="text-white shadow-sm p-2 col-12 col-md-9">
    
  <table class="table text-secondary table-hover">

    <tr class="bg-primadry text-lisght">
      <th class="p-2">Last Name</th>
      <th class="p-2">First Name</th>
      <th class="p-2">Middle Name</th>
      <th class="p-2">Medical Concern</th>
      <th class="p-2">Check-up Date</th>
    </tr>
   
    <tr v-for="checkup in checkups" :key="checkup.id">
        
        <td class="p-2 text-lowercase">{{ checkup.profile.lastname }}</td>
        
        <td class="p-2 text-lowercase">{{checkup.profile.firstname }}</td>
        
        <td class="p-2 text-lowercase">{{ checkup.profile.middlename }}</td>

        <td class="p-2 text-lowercase">{{ checkup.med_concern }}</td>

        <td class="p-2 text-lowercase">{{ checkup.check_date }}</td>
        
    </tr>

    <caption class="text-center" v-if="Object.keys(checkups).length === 0">No data</caption>
   
  </table>
  
    </div>
  </div>

  <div v-else-if="reportChoice == 6" ref="printable" id="printable" class="row mt-1  text-break justify-content-center pb-4">
    <div class="text-white shadow-sm p-2 col-12 col-md-9">
    
  <table class="table text-secondary table-hover">

    <tr class="bg-primadry text-lisght">
      <th class="p-2">Last Name</th>
      <th class="p-2">First Name</th>
      <th class="p-2">Middle Name</th>
      <th class="p-2">Medical Concern</th>
      <th class="p-2">Check-up Date</th>
    </tr>
  
    <tr v-for="immunization in immunizations" :key="immunization.id">
        
        <td class="p-2 text-lowercase">{{ immunization.profile.lastname }}</td>
        
        <td class="p-2 text-lowercase">{{immunization.profile.firstname }}</td>
        
        <td class="p-2 text-lowercase">{{ immunization.profile.middlename }}</td>

        <td class="p-2 text-lowercase">{{ immunization.immunization_type }}</td>

        <td class="p-2 text-lowercase">{{ immunization.check_date }}</td>
        
    </tr>

    <caption class="text-center" v-if="Object.keys(immunizations).length === 0">No data</caption>
   
  </table>
  
    </div>
  </div>

  <div v-else-if="reportChoice == 7" ref="printable" id="printable" class="row mt-1  text-break justify-content-center pb-4">
    <div class="text-white shadow-sm p-2 col-12 col-md-9">
    
  <table class="table text-secondary table-hover">

    <tr class="bg-primadry text-lisght">
      <th class="p-2">Last Name</th>
      <th class="p-2">First Name</th>
      <th class="p-2">Middle Name</th>
      <th class="p-2">Last Mensprenatal</th>
      <th class="p-2">Check-up Date</th>
    </tr>
  
    <tr v-for="prenatal in prenatals" :key="prenatal.id">
        
        <td class="p-2 text-lowercase">{{ prenatal.profile.lastname }}</td>
        
        <td class="p-2 text-lowercase">{{prenatal.profile.firstname }}</td>
        
        <td class="p-2 text-lowercase">{{ prenatal.profile.middlename }}</td>

        <td class="p-2 text-lowercase">{{ prenatal.lmp }}</td>

        <td class="p-2 text-lowercase">{{ prenatal.check_date }}</td>
        
    </tr>

    <caption class="text-center" v-if="Object.keys(prenatals).length === 0">No data</caption>
   
  </table>
  
    </div>
  </div>


<vue-html2pdf
        :show-layout="false"
        :float-layout="true"
        :enable-download="true"
        :preview-modal="false"
        :paginate-elements-by-height="1400"
        filename="report"
        :pdf-quality="2"
        :manual-pagination="false"
        pdf-format="a4"
        pdf-orientation="portrait"
        pdf-content-width="800px"
 
        
        @hasStartedGeneration="hasStartedGeneration()"
        @hasGenerated="hasGenerated($event)"
        ref="html2Pdf"
    >
        <section slot="pdf-content">
            <div v-html="printHtml"></div>
            
        </section>
    </vue-html2pdf>
    </div>
</template>

<script>

export default {
  mounted(){
    axios.get('/report/patient?rc=' + this.reportChoice + '&tf=' + this.tfChoice)
          .then(res => {
            this.data = res.data
          })
          //this.printHtml = document.getElementById('printable').innerHTML
          //this.printHtml = this.$refs.printable.innerHTML
          setTimeout( () => {
            this.printHtml = this.$refs.printable.innerHTML
            this.isDisabled = !this.isDisabled
        }, 1500)
  },

  data(){
    return{
      reportChoice: 1,
      tfChoice: 1,
      data: [],
      bloods: [],
      checkups: [],
      immunizations: [],
      prenatals: [],
      meds: [],
      releasemeds: [],
      printHtml: '',
      isDisabled: true,
    }
  },

  methods: {
    report(){
      
      if(this.reportChoice == 1){
        axios.get('/report/patient?rc=' + this.reportChoice + '&tf=' + this.tfChoice)
          .then(res => {
            this.data = res.data
          })
        }

      else if(this.reportChoice == 2){
        axios.get('/report/medicine?rc=' + this.reportChoice + '&tf=' + this.tfChoice)
          .then(res => {
            this.data = res.data
            //alert("2")
          })
        }

      else if(this.reportChoice == 3){
        axios.get('/report/releasemed?rc=' + this.reportChoice + '&tf=' + this.tfChoice)
          .then(res => {
            this.releasemeds = res.data.releasemed
            //alert("2")
          })
        }

      else if(this.reportChoice == 4){
        axios.get('/report/bp?rc=' + this.reportChoice + '&tf=' + this.tfChoice)
          .then(res => {
            //return two variable objects
            //this.data = res.data.profile
            this.bloods = res.data.blood
          })
        }

      else if(this.reportChoice == 5){
        axios.get('/report/checkup?rc=' + this.reportChoice + '&tf=' + this.tfChoice)
          .then(res => {
            //return two variable objects
            //this.data = res.data.profile
            this.checkups = res.data.checkup
          })
        }

      else if(this.reportChoice == 6){
        axios.get('/report/immunization?rc=' + this.reportChoice + '&tf=' + this.tfChoice)
          .then(res => {
            //return two variable objects
            //this.data = res.data.profile
            this.immunizations = res.data.immunization
          })
        }

      else if(this.reportChoice == 7){
        axios.get('/report/prenatal?rc=' + this.reportChoice + '&tf=' + this.tfChoice)
          .then(res => {
            //return two variable objects
            //this.data = res.data.profile
            this.prenatals = res.data.prenatal
          })
        }
      

        this.isDisabled = 'true'
      setTimeout( () => {
        this.printHtml = this.$refs.printable.innerHTML
        this.isDisabled = !this.isDisabled
        }, 1500)
      },

      printme(){
        this.$refs.printable.generatePdf();
      },

      generateReport() {
            this.$refs.html2Pdf.generatePdf()
        }
      
      },

  
    
    
}
</script>