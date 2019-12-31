@extends('layouts.app')
@section('title', 'New Article')
@section('header', 'New Article')
@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="/articles" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug" value="{{ old('slug') }}">
                </div>
                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <input type="text" class="form-control" id="excerpt" name="excerpt" placeholder="Enter excerpt" value="{{ old('excerpt') }}">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control textarea" id="content" name="content" placeholder="Place content here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" >{{ old('content') }}</textarea>
                </div>


                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                            <label class="custom-file-label" for="image">Choose image</label>
                        </div>
                        {{--                                        <div class="input-group-append">--}}
                        {{--                                            <span class="input-group-text" id="">Upload</span>--}}
                        {{--                                        </div>--}}
                    </div>
                </div>

                <div class="form-group">
                    <label>Tags</label>
                    <select name="tags[]" multiple class="form-control">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->getKey() }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('tags')
                    <p>{{ $errors->first('tags') }}</p>
                    @enderror
                </div>



            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->


@endsection
