<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <title>{{ config('app.name', 'Laravel') }}</title>


        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
        <div class="h-screen bg-white">
            @include('layouts.navigation')


            @isset($header)
                <header class="bg-red shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <div class="pt-10">
            @if(session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded relative max-w-sm mx-auto" role="alert">
                <strong class="font-bold">{{ session()->get('message') }}</strong>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </span>
            </div>

             @endif

            </div>

          

            <main class="flex justify-center pt-20">
                <div class="w-full max-w-4xl bg-white p-8 rounded-lg shadow-lg">
                    <h1 class="text-center text-2xl font-semibold mb-6">Cadastre aqui os empréstimos feitos na sua loja!</h1>
                    <hr class="mb-6">
                    <div>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="text-red-500">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                    <form class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-2" action="{{route('loans.store')}}" method="POST">
                        @csrf

                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white" for="order">Nome do Produto</label>
                                <input type="text" id="order" name="order" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-200 focus:border-red-200 block p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 w-full" placeholder="Nome do produto" >
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white" for="person">Revendedor</label>
                                <input type="text" id="person" name="person" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-200 focus:border-red-200 block p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 w-full" placeholder="Nome do revendedor" >
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 justify-center md:justify-start">
                            <div class="flex-1">
                                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white" for="date">Data</label>
                                <input type="date" id="date" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-200 focus:border-red-200 block p-2.5 dark:bg-red-700 dark:border-red-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 w-full" >
                            </div>

                            <div class="pt-7">
                                <button type="submit" class="bg-red-300 hover:bg-red-400 text-white font-semibold py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 text-sm w-full md:w-auto">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>


        </div>
        
    </body>
</html>