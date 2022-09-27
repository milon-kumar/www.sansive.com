@extends('backend.master')

@section('content')

    <div class="app-main__outer">

        <!--  Main -->

        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                            </i>
                        </div>
                        <h4>Blogs Edit Form</h4><br>
                        <code  class="d-block page-title-subheading">Show The All Blog </code>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <a href="{{route('backend.blog.index')}}" class="btn-shadow btn btn-danger">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-arrow-left fa-w-20"></i>
                                    Go Back
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('backend.blog.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Blog Title</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" value="{{$blog->title}}" name="title" class="form-control">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Select Category</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="category_id">
                                            @if($categories->count() > 0)
                                                <option>Select Category</option>
                                                @foreach($categories as $category)
                                                    <option {{$blog->category->id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            @else
                                                No Category Found
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Blog Description</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="description"
                                                  id="description"
                                                  rows="10"
                                                  style="width: 100%;height: 100%;"
                                                  placeholder="Blog Description"
                                                  class="form-control border border-dark @error('description') is-invalid @enderror">
                                            {!! $blog->description !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Blog Image</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        <img style="width: 70px;height: 70px;border-radius: 8px;" src="{{asset('/uploads/'.$blog->image)}}" alt="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="title">Status</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-check form-check-inline text-success font-weight-bold">
                                            <label class="form-check-label">
                                                <input {{$blog->status == 1 ? 'checked' : ''}} type="radio" name="status" value="1" class="bg-success form-check-input">
                                                Published
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline text-danger font-weight-bold">
                                            <label class="form-check-label">
                                                <input {{$blog->status == 0 ? 'checked' : ''}} type="radio"  name="status" value="0" class="bg-danger form-check-input">
                                                Unpublished
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-10">
                                        <button class="btn btn-success btn-lg" type="submit" value="">Save Blog</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--  Main -->

        {{--            footer--}}
        @include('backend.includes.footer')
        {{--            footer--}}
    </div>

@endsection

@push('js')
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
