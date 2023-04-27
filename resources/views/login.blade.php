<x-layout>
    <h2 class="mobile:mt-[3.5rem] mt-[2.5rem] text-black text-[1.25rem] font-black">
      {{__('login.Welcome')}}
    </h2>
    <p class="font-normal text-[1rem] text-gray ">{{__('login.Paragraph')}}</p>

    <form action="{{ route('login') }}" method="POST">
        @csrf
     
        <div class="mt-[1rem] mobile:mt-[1.5rem] ">
            <x-input name="username" :text="__('login.Username')" :placeholder="__('login.Username_Placeholder')"/>
            <x-input name="password" :text="__('login.Password')" :placeholder="__('login.Password_Placeholder')" 
            id="password"
            type="password" />
            <div class="mt-[1.5rem] flex flex-row justify-between">
                <div>
                    <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label class="font-semibold text-[0.8rem]">{{__('login.Remember')}}</label>
                </div>
                <a href="{{route('verify.show')}}">{{__('login.Forget_Pass')}}</a>
            </div>

            <div>
                <button type="submit"
                    class="w-[21.4rem] h-[3rem] bg-green mt-[1.5rem] border rounded-md text-white font-black">
                    {{__('login.Log_In')}}</button>

            </div>
    </form>
    <div class="flex flex-row items-center mt-[1.5rem] justify-center">
        <p>{{__('login.Account_Q')}} </p>
        <a class="ml-[0.5rem] font-semibold" href="{{ route('register') }}">{{__('login.Sign_Up')}}</a>
    </div>
    </div>
</x-layout>
