@extends('welcome')

@section('content')
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form action="/task" method="POST" @submit="onSubmit">
            @csrf
            <div class="form-group">
              <label>Title</label>
              <input type="text"
                class="form-control" name="title" v-model="title">
            </div>
            <div class="form-group">
              <label>Body</label>
              <textarea class="form-control" name="body" id="" rows="3" v-model="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection
    
