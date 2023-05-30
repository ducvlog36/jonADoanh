@php
    $isLogin = App\Libs\SessionManager::isLogin();
@endphp

<header id="header">
    <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
        <div class="inner bg-white w-full flex fixed top-0 z-100">
            <div class="header__logo self-center">
                <h1 class="ml-2">
                    <a href="{{ route('home') }}">
                        <div class="text-black font-bold">
                            <img src="{{asset('image/jobsempai_logo.png')}}" width="122" height="49" alt="jobsempai.com"/>
                        </div>
                    </a>
                </h1>
            </div>
            @if ($isLogin)
                <a href="{{ route('candidates') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white nav-tab">
                    応募履歴
                </a>
                <a href="{{ route('job_list') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white nav-tab">
                    求人情報一覧
                </a>
            @endif
        </div>
    </nav>
</header>
