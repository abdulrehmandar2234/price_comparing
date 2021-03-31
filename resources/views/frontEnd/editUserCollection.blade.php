@extends('layouts.frontend')

@section('content')


        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Wishlist</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="my-6">
                <h1 class="text-center">Collection</h1>
            </div>
                <div>
                <form action="{{route('collection.update',$Collection->id)}}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-group">
                      <label for="">Update Collection Name</label>
                      <input type="text"
                        class="form-control" name="name" id="" aria-describedby="helpId" value={{$Collection->name}}>
                    </div>

                    <button type="submit" class="btn btn-primary"> Edit </button>
                 
                </form>
            </div>
        
        </div>
   
  



@endsection