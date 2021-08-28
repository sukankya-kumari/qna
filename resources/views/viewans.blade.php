@extends('base')
@section('content')

@php

$s = NULL;

@endphp
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h6>Q{{$data->questions_id}}. {{$data->title}}</h6>
                </div>

                <div class="card-body">
                    <table class="table">
                        @foreach ($ans as $a)
                        <tr>
                            <td class="border-0">ans:- {{$a->answer}}</td>
                            <td class="border-0">by- {{$a->user->name}}</td>
                            <td class="border-0"><a href="{{url('/vote',$a->id)}}"
                                    class="btn btn-info btn-small text-light">{{$a->vote}}<i
                                        class="bi bi-hand-thumbs-up"></i></a>
                                      
                                <a href="{{url('/unlike',$a->id)}}" class="btn btn-info btn-small text-light"><i
                                        class="bi bi-hand-thumbs-down"></i></a>
                                          @if (session()->has('msg'))
                        <div class="alert alert-danger">
                            {{!!session('msg')!!}}
                        </div>
                  @endif
                                </td>
                      
                        </tr>
                        <?php 
                        $s = $a->status;
                       ?>

                        @endforeach

                    </table>
                    @if ($s == 1 && $ans)
                    <h4 class="text-center"><a href="/insertQ" class="btn disabled btn-secondary">Add Your Answer</a>

                        @else
                        <h4 class="text-center"><a href="/insertQ" class="btn btn-success">Add Your Answer</a>

                            @endif



                        </h4>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
