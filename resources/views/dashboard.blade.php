<x-app-layout>
    <div class="px-4 md:px-20 pt-10 flex flex-col gap-10">


        <div class="w-full flex flex-wrap justify-center md:justify-between gap-6">
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 max-w-xs rounded overflow-hidden shadow-lg">
                <img class="w-full h-48 object-cover" src="{{asset('assets/img/marcas.jpg')}}" alt="marcas">
                <div class="px-6 py-2">
                    <div class="font-bold text-xl mb-2">Cadastrar Marcas</div>
                    <p class="text-gray-700 text-base">
                        Cadastre aqui as marcas existentes na sua loja!
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <a href="{{route('marks.create')}}">
                        <button class="bg-red-300 hover:bg-red-400 text-white font-bold py-2 px-4 rounded w-full">
                            Cadastrar
                        </button>
                    </a>
                </div>
            </div>


            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 max-w-xs rounded overflow-hidden shadow-lg">
                <img class="w-full h-48 object-cover" src="{{asset('assets/img/cosmeticos.jpg')}}" alt="cosmeticos">
                <div class="px-6 py-2">
                    <div class="font-bold text-xl mb-2">Cadastrar Produtos</div>
                    <p class="text-gray-700 text-base">
                        Cadastre aqui os produtos disponíveis na sua loja!
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <a href="{{route('products.create')}}">
                        <button class="bg-red-300 hover:bg-red-400 text-white font-bold py-2 px-4 rounded w-full">
                            Cadastrar
                        </button>
                    </a>
                </div>
            </div>


            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 max-w-xs rounded overflow-hidden shadow-lg">
                <img class="w-full h-48 object-cover" src="{{asset('assets/img/relatorio.jpg')}}" alt="empréstimos">
                <div class="px-6 py-2">
                    <div class="font-bold text-xl mb-2">Empréstimos</div>
                    <p class="text-gray-700 text-base">
                        Cadastre aqui os empréstimos de produtos!
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <a href="{{route('loans.create')}}">
                        <button class="bg-red-300 hover:bg-red-400 text-white font-bold py-2 px-4 rounded w-full">
                            Cadastrar
                        </button>
                    </a>
                </div>
            </div>
        </div>


        <div class="w-full flex flex-wrap justify-center gap-x-20 gap-y-6 mb-10">
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 max-w-xs rounded overflow-hidden shadow-lg">
                <img class="w-full h-48 object-cover" src="{{asset('assets/img/pedidos.jpeg')}}" alt="pedidos">
                <div class="px-6 py-2">
                    <div class="font-bold text-xl mb-2">Cadastrar Pedidos</div>
                    <p class="text-gray-700 text-base">
                        Cadastre aqui os pedidos que chegaram na sua loja!
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <a href="{{route('demands.create')}}">
                        <button class="bg-red-300 hover:bg-red-400 text-white font-bold py-2 px-4 rounded w-full">
                            Cadastrar
                        </button>
                    </a>
                </div>
            </div>


            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 max-w-xs rounded overflow-hidden shadow-lg md:ml-6">
                <img class="w-full h-48 object-cover" src="{{asset('assets/img/clientes.png')}}" alt="clientes">
                <div class="px-6 py-2">
                    <div class="font-bold text-xl mb-2">Cadastrar Clientes</div>
                    <p class="text-gray-700 text-base">
                        Cadastre aqui os clientes!
                    </p>
                </div>
                <div class="px-6 pt-10 pb-2">
                    <a href="{{route('clients.create')}}">
                        <button class="bg-red-300 hover:bg-red-400 text-white font-bold py-2 px-4  rounded w-full">
                            Cadastrar
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

