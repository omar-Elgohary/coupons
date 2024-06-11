<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coupons</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/src/output.css') }}">

  <!-- <style>
    * {
      direction: ltr;
    } -->
  </style>
</head>

<body class=" bg-gray-200">
  <!-- component -->
  <div class="container mx-auto overflow-hidden mt-6 p-4">
    <div
      class="bg-gradient-to-br from-purple-600 to-indigo-600 text-white text-center py-10 px-20 rounded-lg shadow-md relative">
      <img src="{{ asset('uploads/images/'.$coupon->company->image)}}" class="w-20 mx-auto mb-4 rounded-lg">

      <h1 class="text-2xl font-semibold mb-6>">{{$coupon->title}}</h1>

      <p class="text-lg font-medium mb-4">{{$coupon->description}}</p>

      <h1 class="text-2xl font-semibold mb-8">اضغط علي نسخ الكوبون للحافظة </h1>
      <div class="flex items-center space-x-2 mb-6 justify-center gap-2">
        <span id="cpnBtn" class="border border-white bg-white text-purple-600 px-4 py-2 rounded-r cursor-pointer">نسخ
          الكوبون</span>
          <span id="cpnCode" class="border-dashed border text-white px-4 py-2 rounded-l">{{$coupon->coupon}}</span>
        </div>

    @if(auth()->user())
        <div>
          <input type="text" class="form-control text-black" value="http://127.0.0.1:8000/coupon/{{$company->id}}">
        </div> 
    @endif
      <p class="text-sm">© 2022 khaled All Right Reserved</p>

      <div class="w-12 h-12 bg-white rounded-full absolute top-1/2 transform -translate-y-1/2 left-0 -ml-6"></div>
      <div class="w-12 h-12 bg-white rounded-full absolute top-1/2 transform -translate-y-1/2 right-0 -mr-6"></div>

    </div>
  </div>
</body>

</html>
