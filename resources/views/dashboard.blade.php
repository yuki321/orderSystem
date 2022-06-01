<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot> -->
    <a href={{ route('logout') }} onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <b>Logout</b>
    </a>
    <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
        @csrf
    </form>

    <h1>Main</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="/orderHistory">発注履歴一覧</a><br>
                    <a href="">発注</a><br>
                    <a href="/stock">在庫一覧</a><br>
                    <a href="/item">商品一覧</a><br>                     
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
