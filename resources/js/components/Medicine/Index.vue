<template>
    <div class="">

<div v-if="objUser.name == 'admin'" class="row  text-break justify-content-center">
    <div class="pd-2 col-12 col-md-9">

  <div class="row pt-4 px-1">
    <div class="px-0 pb-2 col-6 text-rigdht">
      <a class="btn btn-outline-success" href="/medicine/create">Add Medicine</a>
    </div>
    <div class="px-0 pb-2 col-6 text-right">
      
    </div>
  </div>

</div>
</div>

<div :class="{'pt-4': objUser.name !== 'admin'}" class="row justify-content-center">
  <div class="col-12 col-md-9 border rounded p-1 px-2">
    <div class="row">

      <div class="col-6 col-sm text-secondary">
      <label for="">Number of rows:</label>
      <select class="" @change="sort" v-model.number="perPage" name="" id="">
        <option value="5" selected="">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
        <option value="30">30</option>
      </select>
    </div>

    <div class="col-6 col-sm text-secondary">
      <label for="">Sort by:</label>
      <select v-model="sortChoice" name="" id="" @change="sort">
        <option value="1">Latest</option>
        <option value="2">Name(asc)</option>
        <option value="3">Name(desc)</option>
        <option value="4">Quantity(asc)</option>
        <option value="5">Quantity(desc)</option>
      </select>
    </div>

    <div class="col-12 col-sm text-secondary">
        <div class="input-group input-group-sm">
          <input type="text" v-model="searchData" placeholder="Search by Medicine Name" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
          <div class="input-group-append">
          <button @click="search" class="btn btn-outline-primary" type="button">Search</button>
        </div>
        </div>
    </div>

    </div>

  </div>
</div>

<div class="row mt-1  text-break justify-content-center pb-4">
    <div class="text-white shadow-sm p-2 col-12 col-md-9">
    
  <table class="table text-secondary table-hover">

    <tr class="bg-primary text-light">
        <th>Name</th>
        <th>Type</th>
        <th>Quantity</th>
        <th>Date Received</th>
        <th :class="{'d-none': objUser.name !== 'admin'}">Action</th>
    </tr>
    
      

      <tr v-for="medicine in pageOfItems" :key="medicine.id">
        
        <td class="p-2 text-capitalize">{{ medicine.med_name }}</td>
        
        <td class="p-2 text-capitalize">{{ medicine.med_type }}</td>
        
        <td class="p-2 text-capitalize">{{ medicine.quantity }}</td>

        <td class="p-2 text-capitalize">{{ medicine.date_received }}</td>

        <td :class="{'d-none': objUser.name !== 'admin'}" class="p-2 text-lowercase"><a class="text-danger" :href="'/medicine/' + medicine.id + '/edit'">edit</a></td>
        
      </tr>

      <caption v-if="pageOfItems == ''" class="py-4">
        <div class="text-center py-4">
        <h3 class="py-1 text-center text-secondary">
          Empty result
        </h3>
        <a href="/medicine/create" role="button" class="btn btn-outline-primary">Create new record</a>
        </div>
      </caption>
    
  </table>

  <div class="row justify-content-center">
    <jw-pagination :pageSize="perPage" :maxPages="7" :items="dataMedicine" @changePage="onChangePage"></jw-pagination>
  </div>
  
    </div>
  </div>

    </div>
</template>

<script>
export default {

    props: ['objMedicines', 'objUser'],

   /* mounted(){
      axios.get('/profile/paginate').then(res => {
          this.dataProfile = res.data
        })
        document.querySelector('.wrap').classList.add('d-block')
    },*/

    data(){
      return{
        //exampleItems,
        pageOfItems: [],
        perPage: 5,
        dataMedicine: this.objMedicines,
        sortChoice: 1,
        sortData: [],
        searchData: ''
      }
    },

    
    methods: {
      onChangePage(pageOfItems) {
            // update page of items
            this.pageOfItems = pageOfItems;
        },


      sort(){
        axios.get('/medicine/sort?perPage=' + this.perPage + '&sort=' + this.sortChoice).then(res => {
          this.dataMedicine = res.data
          console.log(res.data[0].barangay);
        })
      },

      paginate(){
        this.perPage
        axios.get('/medicine/paginate').then(res => {
          this.dataMedicine = res.data
        })
        this.sort();
      },

      search(){
        axios.get('/medicine/search?search=' + this.searchData).then(res => {
          this.dataMedicine = res.data
        })
      }
    }
}
</script>