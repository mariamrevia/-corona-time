<x-email.verifylayout>

    <div>
        <h2 class=" font-bold  text-center text-2xl">{{__('passreset.Heading')}}</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
        
            <input type="hidden" name="token" value="{{$request->route('token') }}" >
            <input type="hidden" name="email"  value="{{$_REQUEST['email']}}">
            @php
            $errorClass = $errors->has('password') ? 'border-red-500' : '';
            $validClass = $errors->count() == 0 && !old('password') ? '' : ($errors->has('password') ? '' : 'border-green-500');
        @endphp
            <div>
                <x-input name="password" type="password" :text="__('passreset.New_Pass')"/>
                <div class="flex flex-col mobile:mt-[1.5rem] mt-[1rem]">
                    <label class="font-bold" for='password'>{{ __('passreset.Repeat_Pass') }}</label>
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

            </div>
        
            <button class="w-[21.4rem] h-[3rem] bg-green mt-[1.5rem] border rounded-md text-white font-black" type="submit">{{__('passreset.ResetPass')}}</button>
        </form>
    </div>

</x-email.verifylayout>