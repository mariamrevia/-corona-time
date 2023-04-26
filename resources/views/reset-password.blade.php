<x-email.verifylayout>

    <div>
        <h2 class=" font-bold  text-center text-2xl">{{__('passreset.Heading')}}</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
        
            <input type="hidden" name="token" value="{{$request->route('token') }}" >
            <input type="hidden" name="email"  value="{{$_REQUEST['email']}}">
            
            <x-input name="password" type="password" :text="__("passreset.New_Pass")"/>
            <div>
                <div class="flex flex-col mobile:mt-[1.5rem] mt-[1rem]">
                    <label class="font-bold"  for='password'>{{__('passreset.Repeat_Pass')}}</label>
                    <input
                    class="w-[21.4rem] h-[3.5rem] border rounded mt-[0.5rem]" 
                    name='password_confirmation'
                    type="password" />
                </div>
                <x-error name="password" />

            </div>
        
            <button class="w-[21.4rem] h-[3rem] bg-green mt-[1.5rem] border rounded-md text-white font-black" type="submit">{{__('passreset.ResetPass')}}</button>
        </form>
    </div>

</x-email.verifylayout>