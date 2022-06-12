<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot> -->
    <a href={{ route('logout') }} class="ml-6"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <b>Logout</b>
    </a>
    <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
        @csrf
    </form>

    <h1 class="ml-6">Main</h1>
    <div class="py-6">
        <div class="max-w-xl ml-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="/orderHistory" class="font-bold hover:bg-blue-500">発注履歴一覧</a><br>
                    <a href="" class="font-bold hover:bg-blue-500">発注</a><br>
                    <a href="/stock" class="font-bold hover:bg-blue-500">在庫一覧</a><br>
                    <a href="/item" class="font-bold hover:bg-blue-500">商品一覧</a><br>
                    <!-- 管理者の場合、管理者画面へのリンクが表示される -->
                    @if($isAdmin)
                    <a href="/admin" class="font-bold hover:bg-blue-500">管理者画面</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
