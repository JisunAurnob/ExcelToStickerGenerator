@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <h1></h1>
    <div class="row offset-md-4">
        <div class="col-md-8">
            <form action="{{ route('upload') }}" class="col-md-6" method="post" enctype='multipart/form-data'>
                {{ csrf_field() }}<br>
                <span class="text-danger">
                    @if (!empty($errormsg))
                        {{ $errormsg }}
                    @endif
                </span>
                <div class="mb-3">
                    <label for="fileName" class="form-label">File Name</label>
                    <input type="text" class="form-control" id="fileName" placeholder="Enter File Title" name="fileName"
                        value="{{ old('fileName') }}" class="form-control">
                    @error('fileName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Input Excel File (.xlsx Only)</label>
                    <input class="form-control" type="file" id="formFile" name="excelFile">
                    @error('excelFile')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <center><input type="submit" class="btn btn-secondary btn-lg" value="Upload"></center>
            </form>
        </div>
        <div class="col-md-6">
            <div style="height: 330px; overflow: auto; border-style: groove;">
                {{-- <div class="spinner-border text-secondary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div> --}}
                <br><br>
                <div class="container">
                    @foreach ($exFiles as $excelFile)
                        <p style="font-size: 25px; background:light-gray">
                            <a style="text-decoration: none" href="{{ $excelFile->Excel_Files }}">
                                {{ $excelFile->Id }}.
                                {{ $excelFile->Excel_Title }}</a>
                            <a style="float: right" href="/file/delete/{{ $excelFile->Id }}"
                                class="btn btn-danger">Delete</a>

                            <a style="float: right" href="/file/preview/{{ $excelFile->Id }}" class="btn btn-Info">Preview</a>
                        </p>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
