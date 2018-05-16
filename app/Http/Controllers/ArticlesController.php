<?php

    namespace App\Http\Controllers;

    use App\Article;
    use App\Http\Requests\ArticleRequest;
    use Illuminate\Support\Facades\Auth;


    /**
     * Class ArticlesController
     * @package App\Http\Controllers
     */
    class ArticlesController extends Controller
    {
        /**
         * ArticlesController constructor.
         */
        public function __construct()
        {
           // $this->middleware('auth', ['only' => 'create']);

            $this->middleware('auth', ['except' => 'create']);

        }

        /**
         * Показать список всех статей
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function index()
        {
            $articles = Article::latest()->published()->get();

            return view('articles.index', compact('articles'));
        }

        /**
         * Метод для показа отдельной статьи
         * @param $id
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function show(Article $article)
        {

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
            $article = new Article($request->all());
            Auth::user()->articles()->save($article);

            return redirect('articles');
        }

        /**
         * Переход на страницу редактирования
         * @param $id
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function edit(Article $article)
        {
            return view('articles.edit', compact('article'));
        }

        /**
         * Редактирование статьи статьи
         * @param ArticleRequest $request
         * @param $id
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function update(ArticleRequest $request,Article $article)
        {
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


