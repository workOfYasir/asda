@extends('../backend/layout/top-menu' )
@section('subcontent')

        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-3 mt-4">
                    <div class="card-body">
                        <form method="POST" action="{{route('job-store')}}">
                            @csrf
                            <div class="form-group">
                                <label>Job Title</label>
                                <input type="text" class="input w-full border mt-2 @error('name') is-invalid @enderror" name="name" placeholder="Title">

                            </div>
                            <div class="form-group">
                                <label>Job Description</label>
                                <textarea class="form-control" name="summernote" id="summernote"></textarea>
                            </div>
                            <div class="text-right mt-5">
                                <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                             </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

@endsection



