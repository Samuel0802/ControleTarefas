<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\RedefinirSenhaNotification;
use App\Notifications\VerificarEmailNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



//implementado verificação de email do usuario
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

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


//Metodo Verificação de alteração de senha
public function sendPasswordResetNotification($token)
{
    // atributo email e token do usuario estanciado para Notifications/RedefinirSenhaNotification
    $this->notify(new RedefinirSenhaNotification($token, $this->email, $this->name));
}

//Metodo de verificação de email
public function sendEmailVerificationNotification()
{
    $this->notify(new VerificarEmailNotification($this->name));
}

public function tarefas(){
    //HasMany (Tem muitos)
    //USER pertence a muitas TAREFAS
    return $this->hasMany('App\Models\Tarefa');
}


}
