<x-layout>

    <h2 class="mobile:mt-[3.5rem] mt-[2.5rem] text-black text-[1.25rem] font-black">
        Welcome to Coronatime
    </h2>
    <p class="font-normal text-[1rem] text-gray ">Please enter required info to sign up</p>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mt-[1rem] mobile:mt-[1.5rem] ">
            <x-input name="username" />
            <x-input name="email" />
            <x-input name="password" id="password" type="password" />
            <x-input name="password_confirmation" id="password_confirmation" type="password" />
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div class="mt-[1.5rem] flex flex-row justify-between">
                <div>
                    <input type="checkbox" name='remember' />
                    <label class="font-semibold text-[0.8rem]">Remember this device</label>
                </div>

                <a>Forgot password?</a>

            </div>

            <div>

                <button type="submit"
                    class="w-[21.4rem] h-[3rem] bg-hoho mt-[1.5rem] border rounded-md text-white font-black">SIGN
                    UP</button>

            </div>

    </form>

    <div class="flex flex-row items-center mt-[1.5rem] justify-center">
        <p>already have an account?</p>
        <a class="ml-[0.5rem] font-semibold">Log In</a>
    </div>


    </div>




</x-layout>
