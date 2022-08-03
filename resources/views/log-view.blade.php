@extends('app')


@section('title' , 'Log view')


@section('content')

    <div class="alert alert-danger d-none" role="alert" id="errorAlert"></div>
    <div class="alert alert-info d-none" role="alert" id="infoAlert"></div>

    <div class="container overflow-hidden">
        <div class="row mt-5">

            <div class="col-12">
                <div class="row">
                    <div class="col-11">
                        <input class="form-control" type="text" name="filePath" id="filePath"
                               placeholder="/path/to/file">
                    </div>
                    <div class="col-1">
                        <button class="btn btn-info text-white w-100" id="viewLogBtn">View</button>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <p>
                            <textarea id='lineCounter' wrap='off' readonly></textarea>
                            <textarea id='codeEditor' wrap='off' readonly></textarea>
                        </p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-3">
                        <button class="btn btn-info text-white w-100 seek-btn" id="beginBtn"> |<</button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-info text-white w-100 seek-btn" id="previousBtn"> <</button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-info text-white w-100 seek-btn" id="nextBtn"> ></button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-info text-white w-100 seek-btn" id="endBtn"> >|</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    @vite('resources/js/logScript.js')
@endsection
