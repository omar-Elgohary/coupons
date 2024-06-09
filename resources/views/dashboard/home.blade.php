@include('dashboard.layouts.header')
<div class="bg-gray-100">
<div class="h-screen flex  bg-gray-200">
<!-- Sidebar -->
<div class=" fixed z-50 right-0 bg-gray-800 text-white w-56 min-h-screen overflow-y-auto transition-transform transform translate-x-full ease-in-out duration-300" id="sidebar">
    @include('dashboard.layouts.sidebar')
</div>

    <section class="flex-1 flex flex-col ">
    <div class="bg-white shadow fixed w-full top-0 z-50">
        <div class="container mx-auto">
        <div class="flex justify-between items-center py-4 px-2">
            <button class="text-gray-500 hover:text-gray-600" id="open-sidebar">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        <h1 class="text-xl font-semibold">لوحة التحكم</h1>


        </div>
        </div>
    </div>
    <div class="container mx-auto">
        <h1 class="text-4xl mb-3 mt-3 text-[#4c4ee9] font-black">الشركات المتاحه فى الموقع</h1>
    </div>

    <div class="flex flex-col">
        <div class="px-5 grid justify-center gap-4 sm:grid-cols-2 md:max-w-[64rem] md:grid-cols-3 lg:max-w-[80rem] lg:grid-cols-3  mt-8  container mx-auto">

            @forelse(\App\Models\Company::get() as $item)
                <div class="overflow-hidden bg-white rounded-lg shadow-md">
                    <div class="relative">
                        <a href="{{ route('showAdminCoupon', $item) }}">
                            <img class="w-full h-auto object-cover" src="{{ asset('public/uploads/images/' . $item->image) }}" alt="Image">
                        </a>
                    </div>
                </div>
            @empty
                <div class="flex items-center justify-center w-full">
                    <h1 class="text-danger text-center text-4xl">لا توجد بيانات</h1>
                </div>
            @endforelse

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
