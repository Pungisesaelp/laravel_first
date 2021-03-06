<?php

    namespace App;

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;

    class Article extends Model
    {
        protected $fillable = [
            'title',
            'body',
            'published_at',
        ];
        protected $dates = ['published_at'];

        /**
         * Засетить published_at атрибут
         * @param $date
         */
        public function setPublishedAtAttribute($date)
        {
            $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        }

        public function scopePublished($query)
        {
            $query->where('published_at', '<=', Carbon::now());
        }

        public function scopeUnPublished($query)
        {
            $query->where('published_at', '>=', Carbon::now());
        }

        /**
         * Статья принадлежит пользователю
         */
        public function  user (){

        }
    }
