@include('dashboard.layouts.header')
<div class="bg-gray-100">
<div class="h-screen flex overflow-hidden bg-gray-200">
<!-- Sidebar -->
<div class=" absolute z-50 right-0 bg-gray-800 text-white w-56 min-h-screen overflow-y-auto transition-transform transform translate-x-full ease-in-out duration-300" id="sidebar">
    @include('dashboard.layouts.sidebar')
</div>

    <section class="flex-1 flex flex-col overflow-hidden">
    <div class="bg-white shadow">
        <div class="container mx-auto">
        <div class="flex justify-between items-center py-4 px-2">
            <button class="text-gray-500 hover:text-gray-600" id="open-sidebar">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
            </button>

            <h1 class="text-xl font-semibold">لوحة التحكم</h1>

        </div>
        </div>
    </div>

    <div class="flex-1 overflow-auto p-4">
        <div class="max-w-xl mx-auto mt-20 bg-white rounded-md shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-gray-900 text-white">
            <h1 class="text-lg font-bold">اضافة شركة جديده</h1>
        </div>

    <form action="{{route('storeCompany')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="px-6 py-4">
            <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="card-number">
                اسم الشركه بالعربى
            </label>
            <input class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            name="name_ar" id="name_ar" type="text" placeholder="اسم الشركه">
            </div>

            <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="card-number">
                اسم الشركه بالانجليزي
            </label>
            <input class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="name_en" id="name_en" type="text" placeholder="Company Name">
            </div>

            <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="cvv">
                لوجو الشركه
            </label>

            <input type="file" name="image" accept="image/jpeg, image/png , image/jpg" id="input-file"
                class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                اضافه الشركة
            </button>

        </div>
    </form>

        </div>
    </div>
    </section>


</div>
</div>



<script>
const sidebar = document.getElementById('sidebar');
const openSidebarButton = document.getElementById('open-sidebar');

openSidebarButton.addEventListener('click', (e) => {
    e.stopPropagation();
    sidebar.classList.toggle('translate-x-full');
});

// Close the sidebar when clicking outside of it
document.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && !openSidebarButton.contains(e.target)) {
    sidebar.classList.add('translate-x-full');
    }
});
</script>

</body>

</html>
