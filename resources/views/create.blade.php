@extends('app')
@section('content')


    <h2 class="mb-3" ><u>Create New Activity</u></h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{route('store')}}" method="POST" >
      @csrf
      <div class="mb-3 mt-3">
        <label for="name" class="form-label">Activitiy Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Activity Name" name="name">
        {{-- <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div> --}}
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      
   
                                                                           
@endsection
{{-- crud --}}