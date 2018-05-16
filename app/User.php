<?php

    namespace App;

    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    class User extends Authenticatable
    {
        use Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'username', 'email', 'password',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

        /** Пользователь может иметь несколько статей
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function articles()
        {
            return $this->hasMany('App\Article');
        }

        public function isATeamManager()
        {
            return true;
        }
    }
