<?php
 
 namespace App\Filament\Pages\Auth;
 
 use App\Models\User;
 use Filament\Http\Responses\Auth\Contracts\LoginResponse;
 use Filament\Pages\Auth\Login as BaseLogin;
 use Illuminate\Validation\ValidationException;
 
 class AdminLogin extends BaseLogin
 {
     /**
      * Override authenticate to provide specific error messages for email and password.
      */
     public function authenticate(): LoginResponse
     {
         try {
             return parent::authenticate();
         } catch (ValidationException $e) {
             $data = $this->form->getState();
             
             // 1. Check if user exists by email
             $user = User::where('email', $data['email'])->first();
 
             if (! $user) {
                 throw ValidationException::withMessages([
                     'data.email' => __('Email tidak cocok.'),
                 ]);
             }
 
             // 2. If user exists, but authentication failed, it's a wrong password
             throw ValidationException::withMessages([
                 'data.password' => __('Password yang Anda masukkan tidak cocok.'),
             ]);
         }
     }
 }
