<template>
<div>
<div @click.self="toggleMenu" :class="{overlay: show}">
  <div class="navbar bg-primary">

    <span class="navbar-button" @click="toggleMenu">
    <!-- if you are dealing with condition use key to activate the transition -->
    <transition name="nav" appear>
    <div v-if="!show" key="open">
    <svg  xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="text-light bi bi-list" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/> </svg>
    </div>
    
    <div v-else key="close">
    <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="text-light bi bi-x" viewBox="0 0 16 16"> <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/> </svg>
    </div>
    </transition>
    </span>
    
    <div class="text-light">
      <form method="POST" action="/logout">
        <input type="hidden" name="_token" :value="csrf">
        <button class="logout bg-primary" type="submit">Logout</button>
      </form>
    </div>

  </div>
  
  <transition name="fade">
  <nav id="sidenav" v-if="show" class="overflow-auto pb-6">
    <div class="d-flex align-items-center py-1 px-2 text-light ">
      <svg aria-hidden="true" width="25" height="25" focusable="false" data-prefix="fas" data-icon="laptop-medical" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-laptop-medical fa-w-20 fa-3x">
        <path fill="currentColor" d="M232 224h56v56a8 8 0 0 0 8 8h48a8 8 0 0 0 8-8v-56h56a8 8 0 0 0 8-8v-48a8 8 0 0 0-8-8h-56v-56a8 8 0 0 0-8-8h-48a8 8 0 0 0-8 8v56h-56a8 8 0 0 0-8 8v48a8 8 0 0 0 8 8zM576 48a48.14 48.14 0 0 0-48-48H112a48.14 48.14 0 0 0-48 48v336h512zm-64 272H128V64h384zm112 96H381.54c-.74 19.81-14.71 32-32.74 32H288c-18.69 0-33-17.47-32.77-32H16a16 16 0 0 0-16 16v16a64.19 64.19 0 0 0 64 64h512a64.19 64.19 0 0 0 64-64v-16a16 16 0 0 0-16-16z" class=""></path>
      </svg>
     <h4 class="ml-2">Barangay Health Record</h4>
    </div>
    <hr class="">
    <div class="list">
      
    <div class="px-2 border-bottom d-flex align-items-center">
    <a href="/" class="my-1 px-0 text-light d-flex justify-content-between align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class=" bi bi-speedometer2" viewBox="0 0 16 16"> <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
     <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
    </svg> &nbsp;
     Dashboard
    </a>
  </div>
  
  <div class="dropdown px-2 pb-2 border-bottom d-flex align-items-center">
    <a href="/profile" role="button" class="my-1 pl-1 text-light pointer">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
       <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/> 
       </svg> &nbsp;
       Patients
    </a> 
    
  </div>

  

    <div class="dropdownmed px-2 pb-2 border-bottom d-flex align-items-center">
    <a href="/medicine" role="button" class="my-1 pl-1 text-light pointer">
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="capsules" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="25" height="25" class="svg-inline--fa fa-capsules fa-w-18 fa-3x">
        <path fill="currentColor" d="M555.3 300.1L424.2 112.8C401.9 81 366.4 64 330.4 64c-22.6 0-45.5 6.7-65.5 20.7-19.7 13.8-33.7 32.8-41.5 53.8C220.5 79.2 172 32 112 32 50.1 32 0 82.1 0 144v224c0 61.9 50.1 112 112 112s112-50.1 112-112V218.9c3.3 8.6 7.3 17.1 12.8 25L368 431.2c22.2 31.8 57.7 48.8 93.8 48.8 22.7 0 45.5-6.7 65.5-20.7 51.7-36.2 64.2-107.5 28-159.2zM160 256H64V144c0-26.5 21.5-48 48-48s48 21.5 48 48v112zm194.8 44.9l-65.6-93.7c-7.7-11-10.7-24.4-8.3-37.6 2.3-13.2 9.7-24.8 20.7-32.5 8.5-6 18.5-9.1 28.8-9.1 16.5 0 31.9 8 41.3 21.5l65.6 93.7-82.5 57.7z" class=""></path>
      </svg> &nbsp;
      Medicine
      </a>  
    </div>


<div class="px-2 border-bottom d-flex align-items-center">
  <a href="/bp" class="my-1 px-0 text-light d-flex justify-content-between align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-droplet-half" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10c0 0 2.5 1.5 5 .5s5-.5 5-.5c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z"/> <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z"/> 
    </svg> &nbsp;
    Patients Blood Pressure
  </a>
</div>

<div class="dropdownmed px-2 pb-2 border-bottom d-flex align-items-center">
    <a href="/report" role="button" class="my-1 pl-1 text-light pointer">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list-columns" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 0 .5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2A.5.5 0 0 1 .5 2h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2A.5.5 0 0 1 .5 4h10a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2A.5.5 0 0 1 .5 6h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2A.5.5 0 0 1 .5 8h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Z"/>
      </svg> &nbsp;
      Reports
    </a> 

    </div>

   <!-- <div class="px-2 border-bottom d-flex align-items-center">
       <a href="/releasemed" class="my-1 px-0 text-light d-flex justify-content-between align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-droplet-half" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10c0 0 2.5 1.5 5 .5s5-.5 5-.5c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z"/> <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z"/> </svg> &nbsp;
    Release Medicine</a>
  </div> -->

    </div>
  </nav>
  </transition>
  
</div>
</div>
</template>

<script>
  export default{
    mounted(){
          document.querySelector('.css-loader').classList.add('d-none')
    },
    
    data(){
      return{
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        show: false,
      }
    },
    
    methods:{
      toggleMenu(){
        this.show = !this.show
      },
      
    }
  }
</script>

<style>
  body{
    font-size: 12px;
    height: 100vh;
  }
  .pointer{
    cursor: pointer;
  }
  .logout{
    outline: none;
    font-size: 1.3rem;
    border: none;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
  }
  
  #sidenav{
    height: 100vh;
    min-width: 40%;
    max-width: 60%;
    position: fixed;
    top: 3.5rem;
    left: 0;
    z-index: 99;
    background: #70baff;
    padding: 5px 5px 100px 5px;
  }
  
  .overlay{
    position: absolute;
    width: 100%;
    height: 100vh;
    z-index: 999;
  }
  
  .navbar-button{
    opacity: .7;
  }

  .navbar-button:hover{
    opacity: 1;
    cursor: pointer;
  }
  
  .navbar{
    height: 3.5rem;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 99;
  }
  
  .list{
    font-size: 1.2rem;
    color: #f6f6f6;
  }
  
  a{
    padding: 10px 5px;
    text-decoration: none !important;
    
  }
  
  .caret-bottom{
    transform: rotate(90deg);
    transition: all .3s ease;
  }
  
  .dropdown-list{
    font-size: 1.1rem;
color: #f6f6f6;
  }
  
  


.nav-enter{
  opacity: .5;
  transform: rotate(90deg);
      
}
    
.nav-enter-active{
  transition: all .3s ease;
}

    
.fade-enter-active, .fade-leave-active {
  transition: all .5s ease; 
  
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0; 
  transform: translateX(-50px);
  
}


.dropdown-enter-active, .dropdown-leave-active {
  transition: all .5s ease; 
  
}
.dropdown-enter, .dropdown-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0; 
  transform: translateY(-20px);
  
}

    
    
</style>