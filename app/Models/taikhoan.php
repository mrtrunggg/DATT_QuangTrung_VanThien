<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\taikhoan as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class taikhoan  extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */


    protected $fillable = [
        'tendangnhap',
        'email',
        'matkhau',
        'loaitk',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $hidden = [
        'matkhau',
        'remember_token',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
