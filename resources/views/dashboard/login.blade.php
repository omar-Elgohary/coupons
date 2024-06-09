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

<body class="bg-gray-50">
    <div class=" mt-[120px] flex flex-col justify-center py-12 sm:px-6 lg:px-8 px-6">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="flex items-center justify-center">
                <h2 class="text-center text-4xl leading-9 font-extrabold text-gray-900">موقع Coupon</h2>
            </div>
            <h2 class="mt-6 text-center text-3xl leading-9 font-black text-gray-900">
                لوحة التحكم
            </h2>
        </div>


        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">

            <div class="max-w-sm bg-white rounded-lg overflow-hidden shadow-lg mx-auto">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2"></h2>
                    <p class="text-gray-700 font-bold text-center mb-6">برجاء ادخال اسم المستخدم و كلمة المرور</p>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="user-name">
                                اسم المستخدم
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="name" type="text" placeholder="اسم المستخدم">
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 font-bold mb-2" for="password">
                                كلمة السر
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="password" type="password" placeholder="كلمة السر">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                تسجيل الدخول
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>