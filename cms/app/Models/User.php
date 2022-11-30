<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // github Socialログイン
    // リレーション
    public function identityProviders()
    {
        return $this->hasMany('App\Models\IdentityProvider', 'user_id');
    }

    // github Socialログイン　
    // ログイン処理
    /**
     * ソーシャルログイン処理
     * @param $providerUser プロバイダーユーザ情報
     * @param $provider プロバイダー名
     * @return App\User
     */
    public static function socialFindOrCreate($providerUser, $provider)
    {
      $account = identityProvider::whereProviderName($provider)
                 ->whereProviderUserId($providerUser->getId())
                 ->first();
                 //明日この続き
    }


}
