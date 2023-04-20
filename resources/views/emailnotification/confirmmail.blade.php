<x-mail::message> 
    @component('mail::message')
    ![Image description](https://i.ibb.co/prc027h/Landing.png)
    <div style="background-color: #FFFFFF; padding: 24px">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Confirmation email</h1>
        <p class="text-gray-700">click this button to verify your email</p>
    </div>
    @component('mail::button', [
        'url' => $verificationUrl,
        'color' => 'green',
        'class' => 'w-full mt-6',
    ])
        Verify Email
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
