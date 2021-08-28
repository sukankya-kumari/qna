@extends('base')

@section('title',"insert Question")
    
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto mt-4">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('msg'))
                        <div class="alert alert-danger">
                            {{!!session('msg')!!}}
                        </div>
                  @else
                        <form action="{{route("insertQ")}}" method="POST" class="">
                            @csrf
                            <div class="mb-3">
                                <label for="">answer</label>
                               <textarea name="answer" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <select name="user_id" class="form-control">
                                    @foreach ($users as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="questions_id" class="form-control">
                                    @foreach ($ques as $q)
                                    <option value="{{$q->id}}">{{$q->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-success form-control">
                            </div>
                         
                        </form>
                    @endif
                    </div>
                </div>        
            </div>
        </div>
    </div>
@endsection