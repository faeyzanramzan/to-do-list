@extends('app')
@section('content')


    <h2 class="mb-3" ><u>My TO DO List</u></h2>

    @if (session()->has('success'))
    <div class="alert alert-success">
      <ul>
        <li>{{session ('success') }}</li>
      </ul>
    </div>

    @endif
    

    <div class="d-flex justify-content-end mb-1" >
      
    <a href="{{route('create')}}">
      <button type="button" class="btn btn-success">+ Add Activity</button>
      
    </a>
    </div>
    
    
<table class="table table-striped table-bordered">
    <thead>
        <tr class=text-center>
            <th>No. </th>
            <th>Name</th>
            <th>Status</th>
            <th></th>
          </tr>
    </thead>

   <tbody>
    @foreach ($activities as $key=>$item)
    <tr>
        <td class=text-center>{{++$key}}</td>
        <td>{{$item->name}}</td>
        <td class=text-center>{{$item->sts}}</td>
        <td class=text-center> 
          <div class="btn-group ">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Action</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('edit', $item->id)}}">Edit</a>

              <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete</a>
             <form id ="delete-form" action="{{route('delete', $item->id)}}" method="POST" class="d-none">
              @csrf
              @method('DELETE')
            </form>
                
            </div>
          </div>
        </td>
        </tr>
      @endforeach  
   </tbody>    
  </table>



@endsection


                                                                           

{{-- crud --}}