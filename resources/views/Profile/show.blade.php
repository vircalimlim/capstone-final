@extends('layouts.app')
@section('content')

<div class="row pt-4 pb-0">
  <div class="col">
    <!--<a href="/profile" role="button" class="btn btn-outline-secondary">Show all records</a> -->
  </div>
</div>

<div class="row px-2 pb-4 pt-3 justify-content-center">
<div class="col-12 col-md-8 border shadow-sm bg-white pb-4 rounded text-dark">
  
  <div class="info-wrapper text-secondary">
    
  <div class="row py-3">
    <div class="col border-bottom border-info text-lizght py-2 headings">
      <h3 class="">Patient Information</h3>
    </div>
  </div>
  
  <div class="row align-items-center pl-3 pb-3">
    
    <div class="col text-primary py-2 headings">
      <h5 class="text-uppercase font-weight-bold m-0">{{$profile->lastname}}, {{$profile->firstname}} {{$profile->middlename}}</h5>
      <p class="m-0 text-capitalize">{{$profile->houseNum}} {{$profile->street}}  Brgy. {{$profile->barangay}} Malasiqui, Pangasinan </p>
    </div>
  </div>
  
  <div class="row px-3 mb-3">
    <div class="col-12 bg-light">
      <h5 class="pt-2">Basic Information</h5>
    </div>
  </div>
  
  
  <div class="row align-items-center pl-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Date of Birth</strong></label>
    </div>
    
    <div class="col-12 col-sm-8 col-md-8">
      <p class=" px-3">
      {{$profile->birthdate}}
      </p>
    </div>
  </div>


  <div class="row align-items-center pl-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Age</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class=" px-3">
        {{ $profile->age }}
      </p>
    </div>

    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Gender</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="text-capitalize px-3">
        {{ $profile->gender }}
      </p>
    </div>
  </div>
  
  <div class="row align-items-center pl-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Contact Number</strong></label>
    </div>
    
    <div class="col-12 col-sm-8 col-md-8">
      <p class=" px-3">
      {{$profile->contact ? 0 . $profile->contact : 'N/A'}}
      
      </p>
    </div>
  </div>
  
  
  
  
  <div class="row px-3 my-3">
    <div class="col-12 bg-light">
      <h5 class="pt-2">Blood Pressure History</h5>
    </div>
  </div>
  
  <div class="row">
    <div class="col">
      <table class="table table-hover">
        <tr>
          <th>Blood Pressure</th>
          <th>Checkup Date</th>
          
          
        </tr>

        
        @forelse($profile->blood->reverse()->take(3) as $blood)
        <tr>
          <td>{{ $blood->sp }} / {{$blood->dp }}</td>
          <td>{{ $blood->check_date }}</td>
          
        </tr>

        @empty
        <caption class="text-center"><h4>No data</h4></caption>
        
        @endforelse
        
      </table>

      @if(count($profile->blood) > 2)
      <div class="row">
        <div class="col text-center bg-light rounded">
          <a href="/bp/{{$profile->id}}/show" class="text-center">See all</a>
        </div>
      </div>
      @endif

    </div>
    </div>

    <div class="row px-3 my-3">
    <div class="col-12 bg-light">
      <h5 class="pt-2">Check-up History</h5>
    </div>
  </div>
  
  <div class="row">
    <div class="col">
      <table class="table table-hover">
        <tr>
          <th>Medical Concern</th>
          <th>Checkup Date</th>
          
          
        </tr>

        
        @forelse($profile->checkup->reverse()->take(3) as $checkup)
        <tr>
          <td>{{ $checkup->med_concern }}</td>
          <td>{{ $checkup->check_date }}</td>
          
        </tr>

        @empty
        <caption class="text-center"><h4>No data</h4></caption>
        
        @endforelse
        
      </table>

      @if(count($profile->checkup) > 2)
      <div class="row">
        <div class="col text-center bg-light rounded">
          <a href="/checkup/{{$profile->id}}/show" class="text-center">See all</a>
        </div>
      </div>
      @endif

    </div>
    </div>

    
  <div class="row px-3 my-3">
    <div class="col-12 bg-light">
      <h5 class="pt-2">Medicine Received</h5>
    </div>
  </div>
  
  <div class="row">
    <div class="col">
      <table class="table table-hover">
        <tr>
          <th>Medicine Name</th>
          <th>Release Date</th>
          <th>Quantity</th>
          <th>Concern</th>
        </tr>
        
        @forelse($profile->medicine->reverse()->take(3) as $med)
        <tr>
          <td>{{$med->med_name}}</td>
          <td>{{$med->pivot->date_released}}</td>
          <td>{{$med->pivot->quantity}}</td>
          <td>{{$med->pivot->concern}}</td>
        </tr>
        @empty
        <caption class="text-center"><h4>No data</h4></caption>
        
        @endforelse
      </table>

      @if(count($profile->medicine) > 2)
      <div class="row">
        <div class="col text-center bg-light rounded">
          <a href="/releasemed/{{$profile->id}}/show" class="text-center">See all</a>
        </div>
      </div>
      @endif
        
    </div>
  </div>

  <div class="row px-3 my-3">
    <div class="col-12 bg-light">
      <h5 class="pt-2">Immunization History</h5>
    </div>
  </div>
  
  <div class="row">
    <div class="col">
      <table class="table table-hover">
        <tr>
          <th>Immunization Type</th>
          <th>Checkup Date</th>
          <th>Medical concern</th>
          
          
        </tr>

        
        @forelse($profile->vaccine->reverse()->take(3) as $vaccine)
        <tr>
          <td>{{ $vaccine->immunization_type }}</td>
          <td>{{ $vaccine->check_date }}</td>
          <td>{{ $vaccine->med_concern }}</td>
          
        </tr>

        @empty
        <caption class="text-center"><h4>No data</h4></caption>
        
        @endforelse
        
      </table>

      @if(count($profile->vaccine) > 2)
      <div class="row mb-2">
        <div class="col text-center bg-light rounded">
          <a href="/vaccine/{{$profile->id}}/show" class="text-center">See all</a>
        </div>
      </div>
      @endif

    </div>
    </div>

@if($profile->gender == "Female" || $profile->gender == "female")
    <div class="row px-3 my-3">
    <div class="col-12 bg-light">
      <h5 class="pt-2">Prenatal History</h5>
    </div>
  </div>

    <div class="row">
    <div class="col">
      <table class="table table-hover">
        <tr>
          <th>Last Menstrual Period</th>
          <th>Checkup Date</th>
          
          
        </tr>

        
        @forelse($profile->prenatal->reverse()->take(3) as $prenatal)
        <tr>
          <td>{{ $prenatal->lmp }}</td>
          <td>{{ $prenatal->check_date }}</td>
          
        </tr>

        @empty
        <caption class="text-center"><h4>No data</h4></caption>
        
        @endforelse
        
      </table>

      @if(count($profile->prenatal) > 2)
      <div class="row mb-2">
        <div class="col text-center bg-light rounded">
          <a href="/prenatal/{{$profile->id}}/show" class="text-center">See all</a>
        </div>
      </div>
      @endif

    </div>
    </div>
    @endif

 
  
  <div class="text-right">
    <div class="d-inline p-2">
      <a href="/profile/{{$profile->id}}/edit" role="button" class="btn btn-outline-success font-weight-bold py-2 px-4">Edit</a>
    </div>

    <div class="d-inline py-2">
      <form class="d-inline" method="POST" action="/profile/{{$profile->id}}/delete">
        @csrf
        @method('DELETE')
      <button class="btn btn-danger font-weight-bold py-2 px-4">Delete</button>
      </form>
    </div>
  </div>
  
  
  </div>

</div>

<div class="col-12 col-md-4">
  <div class="row px-md-2 py-2 py-md-0">
  <div class="col-12 border shadow-sm bg-white pb-4 rounded text-secondary">

  <div class="row py-3">
    <div class="col border-bottom border-info text-lizght py-2 headings">
      <h3 class="">Action</h3>
    </div>
  </div>
    
  <div class="row hover align-items-center pl-4 py-2">
    <div class="col">
      <label><strong>Check-up</strong></label>
    </div>
    
    <div class="col">
      <a href="/checkup/{{$profile->id}}" class="btn btn-outline-success px-3 ">
        Go
      </a>
    </div>
  </div>

  <div class="row hover align-items-center pl-4 py-2">
    <div class="col">
      <label><strong>Monitor Blood Pressure</strong></label>
    </div>
    
    <div class="col">
      <a href="/bp/{{$profile->id}}" class="btn btn-outline-success px-3 ">
        Go
      </a>
    </div>
  </div>
  
  <div class="row hover align-items-center pl-4 py-2">
    <div class="col">
      <label><strong>Get Medicines </strong></label>
    </div>
    
    <div class="col">
      <a href="/releasemed/{{$profile->id}}" class="btn btn-outline-success px-3 ">
        Go
      </a>
    </div>
  </div>
  
  <!-- <div class="row hover align-items-center pl-4 py-2">
    <div class="col">
      <label><strong> Check-up </strong></label>
    </div>
    
    <div class="col">
      <a href="/checkup" class="btn btn-outline-success px-3 ">
        Go
      </a>
    </div>
    </div> -->

    <div class="row hover align-items-center pl-4 py-2">
    <div class="col">
      <label><strong> Immunization </strong></label>
    </div>
    
    <div class="col">
      <a href="/vaccine/{{$profile->id}}" class="btn btn-outline-success px-3 ">
        Go
      </a>
    </div>
    </div>
@if($profile->gender == 'Female' || $profile->gender == 'female')
    <div class="row hover align-items-center pl-4 py-2">
    <div class="col">
      <label><strong> Prenatal </strong></label>
    </div>
    
    <div class="col">
      <a href="/prenatal/{{$profile->id}}/create" class="btn btn-outline-success px-3 ">
        Go
      </a>
    </div>
    </div>
@endif

  </div>
  </div>
</div>


</div>


@endsection