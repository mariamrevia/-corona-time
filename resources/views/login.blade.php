<x-layout>
    <h2 class="mobile:mt-[3.5rem] mt-[2.5rem] text-black text-[1.25rem] font-black">
        Welcome to Coronatime
    </h2>
    <p class="font-normal text-[1rem] text-gray ">Welcome back! please enter your details</p>

    <form action="{{route('login.store')}}" method="POST">
        @csrf
        <div class="mt-[1rem] mobile:mt-[1.5rem] ">
            <x-input name="login" />
            @error('login')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
            <x-input name="password" id="password" type="password" />

            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <div class="mt-[1.5rem] flex flex-row justify-between">
                <div>
                    <input type="checkbox" />
                    <label class="font-semibold text-[0.8rem]">Remember this device</label>
                </div>
                <a>Forgot password?</a>
            </div>

            <div>
                <button 
                type="submit"
                class="w-[21.4rem] h-[3rem] bg-green mt-[1.5rem] border rounded-md text-white font-black">
                LOG IN</button>

            </div>
    </form>
    <div class="flex flex-row items-center mt-[1.5rem] justify-center">
        <p>Don’t have and account? </p>
        <a class="ml-[0.5rem] font-semibold" href="{{route('register')}}">Sign up for free</a>
    </div>
    </div>
</x-layout>