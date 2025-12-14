@extends('template.default')
@section('content')
    <h1>this is myviews2.blade.php</h1>
@endsection
@push('scripts')
    <h1>my views2 scripts</h1>
@endpush
@push('scripts')
    <h1>my views3 scripts</h1>
@endpush
@push('scripts')
    <script>
        myvar = 1
        console.log("myvar =", myvar)
    </script>
    <script>
        let myvar2
        myvar2 = "hello"
        console.log(myvar, myvar2)

    </script>
    <script>
    
        console.log(document.getElementsByTagName(myinput).value)
    </script>
@endpush