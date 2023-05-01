<x-layout>
    <h2 class="mobile:mt-[3.5rem] mt-[2.5rem] text-black text-[1.25rem] font-black">
        {{ __('register.Welcome') }}
    </h2>
    <p class="font-normal text-[1rem] text-gray ">{{ __('register.paragraph') }}</p>


    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mt-[1rem] mobile:mt-[1.5rem] w-[21.4rem]">
            <x-input name="username" :text="__('register.Username')" :placeholder="__('register.Username_Ph')" />
            <x-input name="email" :text="__('register.Email')" :placeholder="__('register.Email_ph')" />
            <x-input name="password" :text="__('register.Password')" :placeholder="__('register.Pass_Ph')" id="password" type="password" />

            @php
                $errorClass = $errors->has('password') ? 'border-red-500' : '';
                $validClass = $errors->count() == 0 && !old('password') ? '' : ($errors->has('password') ? '' : 'border-green-500');
            @endphp
            <div class="flex flex-col mobile:mt-[1.5rem] mt-[1rem]">
                <label class="font-bold" for='password'>{{ __('register.Reset_Password') }}</label>
                <div class="w-[21.4rem] h-[3.5rem] flex items-center border-[2px] rounded mt-[0.5rem] focus-within:border-primaryBlue  focus-within:ring focus:shadow-shadow {{ $errorClass }} {{ $validClass }}">
                    <div class=" w-[21.4rem] flex flex-row items-center justify-center">
                <input placeholder="{{ __('register.RepatPass_Ph') }}"
                    class="w-[17rem] h-[3rem] outline-none"
                    name='password_confirmation' type="password" />
                    @if ($validClass)   
                    <img src="{{ asset('images/Vector1.png') }}" class="w-[20px] h-[20px]"  />
                    @endif
                </div>
            </div>
            </div>


            <x-error name="password" />
            <div class="mt-[1.5rem] flex flex-row justify-between">
                <div>
                    <input type="checkbox" name='remember' />
                    <label class="font-semibold text-[0.8rem]">{{ __('register.Remember') }}</label>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="w-[21.4rem] h-[3rem] bg-green mt-[1.5rem] border rounded-md text-white font-black">{{ __('register.Sign_Up') }}</button>
            </div>

    </form>

    <div class="flex flex-row items-center mt-[1.5rem] justify-center">
        <p>{{ __('register.Account_Hint') }}</p>
        <a class="ml-[0.5rem] font-semibold" href="{{ route('login.show') }}">{{ __('register.Log_In') }}</a>
    </div>


    </div>




</x-layout>
