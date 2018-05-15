<?php

    namespace App\Http\Controllers;

    use App\Article;
    use App\Http\Requests\ArticleRequest;


    /**
     * Class ArticlesController
     * @package App\Http\Controllers
     */
    class ArticlesController extends Controller
    {
        /**
         * Показать список всех статей
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function index()
        {
            $articles = Article::latest()->published()->get();
//            $articles = Article::order_by('published_at', 'desc')->get();

            return view('articles.index', compact('articles'));
        }

        /**
         * Метод для показа отдельной статьи
         * @param $id
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function show($id)
        {
            $article = null;

            $article = Article::findOrFail($id);
            return view('articles.show', compact('article'));

        }

        /**
         * Перейти на страницу создания статьи
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function create()
        {
            return view('articles.create');
        }

        /**
         * Создать новую статью
         * @param ArticleRequest $request
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function store(ArticleRequest $request)
        {

            Article::create($request->all());
            return redirect('articles');
        }

        /**
         * Переход на страницу редактирования
         * @param $id
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function edit($id)
        {
            $article = Article::findOrFail($id);
            return view('articles.edit', compact('article'));
        }

        /**
         * Редактирование статьи статьи
         * @param ArticleRequest $request
         * @param $id
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function update(ArticleRequest $request, $id)
        {
            $article = Article::findOrFail($id);
            $article->update($request->all());
            return redirect('articles');
        }

        /**
         * Статья принадлежит этому пользователю
         * @return mixed
         */
        public function user()
        {
            return $this->belongsTo('App\User');
        }


    }


