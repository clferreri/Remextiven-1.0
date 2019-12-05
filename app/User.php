<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\PhysicalPerson;
use App\Models\LegalPerson;
use App\Models\BankAccount;
use App\Models\Ciudad;
use App\Models\Pais;
use App\Models\UserCard;
use App\Models\UserCheck;

class User extends Authenticatable
{

    protected $table = 'usuariosR';
    protected $primaryKey = 'IdUsuarioR';
    protected $remember_token = false;
    protected $guarded = ['IdUsuarioR'];

    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TipoUsuario', 'Email', 'Password', 'FechaRegistro','IdRol', 'Activo', 'Verificado', 'PinTransacciones', 'TokenActivacion', 'NewsLetters', 'TokenReferido', 'RutaImagen', 'EsReferido', 'UltimoLogin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Contrasena', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getAuthPassword()
    {
        $pass = $this->Password;
        return $pass;
    }

    public function persona()
    {
        // if ($this->TipoUsuario == "P"){
            return $this->hasOne('App\Models\PhysicalPerson', 'IdUsuario', 'IdUsuarioR');
        // }
        // else{
            return $this->hasOne('App\Models\LegalPerson', 'IdUsuario', 'IdUsuarioR');
        
    }

    //Retorna todos los datos de la persona que pertenece al usuario
    public function getPersonaLigada()
    {
        if ($this->TipoUsuario == "P"){
            $persona = PhysicalPerson::where('IdUsuario', $this->IdUsuarioR)->first();
        }
        else{
            $persona = LegalPerson::where('IdUsuario', $this->IdUsuarioR)->first();
        }

        return $persona;
    }

    public function soyPersona(){
        if($this->TipoUsuario == "P"){
            return true;
        }
        else{
            return false;
        }
    }

    //Retorna un string con el nombre completo del usuario (para Persona o empresa)
    public function getNombreCompleto()
    {
        $nombreCompleto ="";
        if ($this->TipoUsuario == "P"){
            $persona = PhysicalPerson::where('IdUsuario', $this->IdUsuarioR)->first();
            $nombreCompleto = $persona->Nombre . " " . $persona->PrimerApellido;
        }
        else{
            $persona = LegalPerson::where('IdUsuario', $this->IdUsuarioR)->first();
            $nombreCompleto = $persona->RazonSocial . " " . $persona->FormaJuridica;
        }

        return $nombreCompleto;
        
    }
    
    public function getImagen()
    {
        return $this->RutaImagen;     
    }

    //Devuelve las cuentas Bancaria del usuario
    public function getCuentaBancaria()
    {
       return BankAccount::where('IdUsuario', $this->IdUsuarioR)->get();
    }

    //devuelve los medios de pago del usuario
    public function getMediosPago()
    {
        return UserCard::where('IdUsuario', $this->IdUsuarioR)->get();
    }


    //Devuelve si el usuario esta o no verificado
    public function usuarioVerificado()
    {
        $verificado = UserCheck::where('IdUsuario', $this->IdUsuarioR)->first();
        if(!$verificado){
            return false;
        }
        else{
            if ($verificado->IdDigitador == null){
                return false;
            }
            else{
                return true;
            }
        }
    }

    public function getNombrePais($idPais)
    {
        $pais = Pais::where('IdPais', $idPais)->first();
        return $pais->Pais;
    }

    public function getNombreCiudad($idCiudad){
        $ciudad = Ciudad::where('IdCiudad', $idCiudad)->first();
        return $ciudad->Ciudad;
    }    

    //////////////////////////////////////////////////////////////////////////
    ///////////////// INICIO DE RELACIONES //////////////////////////////////
    /////////////////////////////////////////////////////////////////////////

    //------------------  1 A 1  -----------------------------
    // RELACION (1 A 1) (Usuario - Persona)
    public function DatosPersona(){
            return $this->hasOne('App\Models\PhysicalPerson', 'IdUsuario', 'IdUsuarioR');
    }

    // RELACION (1 A 1) (Usuario - Empresa)
    public function DatosEmpresa(){
        return $this->hasOne('App\Models\LegalPerson', 'IdUsuario', 'IdUsuarioR');
    }

      // RELACION (1 A 1) (Usuario - Rol)
      protected function Rol(){
        return $this->hasOne('App\Models\UserRol', 'IdRol', 'IdRol');
    }

    //--------------------  1 a N  -----------------------------------

    // Relacion (1 a N) (Usuario - Cuentas Beneficiarias)
    protected function CuentasBeneficiarias(){
        return $this->hasMany('App\Models\BeneficiaryAccount', 'IdUsuario', 'IdUsuarioR');
    }


    // RELACION (1 A N) (Usuario - Cuentas Bancarias)
    protected function CuentasBancarias(){
        return $this->hasMany('App\Models\BankAccount', 'IdUsuario', 'IdUsuarioR');
    }

}
