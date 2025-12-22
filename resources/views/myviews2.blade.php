@extends('template.default')
@section('titel' , 'myviews2')
@section('heeader1',"MyView2")
@section('content')
        <?php echo "<h1>Hello php</h1>";


        $myarry = [10,20,30,40,50];
        echo $myarry[2];
        echo "<br>";
        var_dump($myarry);
        echo "<br>";
        print_r($myarry);
        echo "<br>";
        $myarry2["a"] = 10;
        $myarry2["b"] = 20;
        $myarry2["c"] = 30;
        $myarry2[] =[10,20,[30,40]];
        print_r($myarry2);
        echo "<br>";


        ?>

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
