<div class="border p-4 shadow-lg max-w-lg mx-auto mt-4">
    <h2 class="text-3xl font-bold mb-2 font-mono">Productos Costeados</h2>
    @forelse ($productosCosteados as $producto)
        <div class="border p-2 mb-2">
            <p><strong>Nombre:</strong> {{ $producto['nombre'] }}</p>
            <p><strong>Precio Costo:</strong> ${{ $producto['precio_costo'] }} pesos</p>
            <p><strong>Porcentaje:</strong> {{ $producto['porcentaje'] }}%</p>
            <p><strong>Precio Venta:</strong> ${{ $producto['precio_venta'] }} pesos</p>
            <p><strong>Margen:</strong> {{ $producto['margen'] }}%</p>
        </div>
        @empty
        <p class="text-center font-extralight mt-5 text-gray-400 text-xl">Ningún producto, costea alguno.</p>
    @endforelse
</div>
