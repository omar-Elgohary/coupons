@include('dashboard.layouts.header')
<div class="bg-gray-100">
<div class="h-screen flex bg-gray-200">
    <!-- Sidebar -->
    <div class=" absolute z-50 right-0 bg-gray-800 text-white w-56 min-h-screen overflow-y-auto transition-transform transform translate-x-full ease-in-out duration-300" id="sidebar">
        @include('dashboard.layouts.sidebar')
    </div>

    <section class="flex-1 flex flex-col">
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

            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-3 edit-btn rounded-[8px]"><a
                href="{{route('addCompany')}}">اضافة شركة</a>
            </button>

        </div>
        </div>
    </div>

    <div class="container mx-auto">
        <h1 class="text-2xl mb-3 mt-3 font-bold">قائمة الشركات</h1>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
            <table class="min-w-full">

                <thead class="bg-white border-b">
                <tr class="text-center">
                    <th class="text-base font-semibold text-gray-900 px-6 py-4 text-righ">م
                    </th>
                    <th class="text-base font-semibold text-gray-900 px-6 py-4 text-righ">
                    لوجو
                    </th>
                    <th class="text-base font-semibold text-gray-900 px-6 py-4 text-righ">اسم الشركه
                    </th>
                    <th class="text-base font-semibold text-gray-900 px-6 py-4 text-righ">
                    عدد القسائم
                    </th>
                    <th class="text-base font-semibold text-gray-900 px-6 py-4 text-righ">
                    عرض
                    </th>
                </tr>
                </thead>

            @forelse($companies as $key => $item)
                <tbody id="data">
                <tr class="text-center bg-gray-100 border-b r">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center text-gray-900">{{$key+1}}</td>
                    <td><img src="{{ asset('public/uploads/images/' . $item->image) }}" alt="" width="50" height="50" class="m-auto"></td>
                    <td class="text-base font-medium text-gray-900 px-6 py-4 text-center whitespace-nowrap">{{ $item->name_ar }} - {{ $item->name_en }}</td>
                    <td class="text-base font-medium text-gray-900 px-6 py-4 text-center whitespace-nowrap">{{$item->coupons->count()}}</td>

                    <td class="text-base font-medium text-gray-900 px-6 py-4 text-center whitespace-nowrap">
                    <button
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-3 edit-btn rounded-[8px]"><a
                        href="{{route('showCompany', $item->id)}}">عرض</a></button>
                    </td>
                </tr>
                </tbody>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-base font-medium text-gray-900 px-6 py-4">لا توجد بيانات</td>
                </tr>
                @endforelse
            </table>
            </div>
        </div>
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
