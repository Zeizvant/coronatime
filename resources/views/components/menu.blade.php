<nav @click.outside="show = false" x-data="{show: false}">
    <div>
        <div class="relative flex h-16 items-center justify-between">
            <div class="block md:hidden flex items-center">
                <button x-show="!show" @click="show = !show" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-50 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <img class="cursor-pointer w-[24px]" src="{{ asset('images/menu.png') }}" alt="menu img" />
                </button>
                <button x-show="show" @click="show = !show" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-50 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Close main menu</span>
                    <img class="cursor-pointer w-[24px]" src="{{ asset('images/close_button.png') }}" alt="menu img" />
                </button>
            </div>
            <div class="hidden md:block flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="md:ml-6">
                    <div class="flex gap-8">
                        <div class="font-bold main-dark">{{ auth()->user()->username }}</div>
                        <di class="border-grey border-l"></di>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="cursor-pointer">{{ __('landing.log_out') }}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div x-show="show" class="z-10 bg-white absolute h-max-fit md:hidden w-screen left-0 flex justify-center" id="mobile-menu">
        <div class="w-11/12 flex flex-col items-center rounded-md shadow-lg p-10">
            <div class="font-bold main-dark">username</div>
            <div>log out</div>
        </div>
    </div>
</nav>

