<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto mt-3">
                <div class="card">
                    <div class="d-flex">
                        <input type="search" wire:model="search" placeholder="search any question" class="rounded-0 border-0 form-control">
                        <button type="button" class="btn btn-light rounded-0 border-0"><i class="bi bi-search"></i></button>
                        <div wire:loading wire:target="search" class="col-4 ms-auto">
                            <p class="text-info font-weight-bold">Searching...........</p>
                        </div>
                    </div>
                   
                    <div class="card-header border">
                        <a href="#Modal" class="btn" data-bs-toggle="modal">
                            Add Questions
                        </a>
                    </div>
                    <div class="card-body">
                       <div class="list-group border-0">
                          @foreach ($question as $q)
                          <a href="{{route('viewans',['id'=>$q->id])}}" class="list-group-item list-group-item-action">{{$q->id}}. {{$q->title}}</a>
                         
                          @endforeach
                       </div> 
                       <div class="col-3 mx-auto">
                        {{$question->links()}}
                       </div>

    
                    </div>
                </div>
            </div>
</div>
