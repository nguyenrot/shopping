<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">{{$name . " " . $key}}</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route($name."."."index")}}">{{$name}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$key}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
