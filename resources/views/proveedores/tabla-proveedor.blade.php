    <h1 style="text-align:center;">Proveedores</h1>
<table style="width: 100%; border-collapse: collapse; border: 1px solid #e2e8f0;">
    <thead style="background-color: #2b9dbd; color: #ffffff;">
        <tr>
            <th style="padding: 12px; text-align: left; font-weight: bold;">Nombre</th>
            <th style="padding: 12px; text-align: left; font-weight: bold;">Email</th>
            <th style="padding: 12px; text-align: left; font-weight: bold;">Teléfono</th>
        </tr>
    </thead>

    <tbody style="background-color: #f7fafc;">
        @forelse ($proveedores as $proveedor)
            <tr style="border-top: 1px solid #e2e8f0; padding: 12px;">
                <td style="padding: 12px;">{{ $proveedor->nombre }}</td>
                <td style="padding: 12px;">{{ $proveedor->email }}</td>
                <td style="padding: 12px;">{{ $proveedor->telefono }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" style="padding: 12px; text-align: center; font-weight: 300;">Ningún proveedor, agrega alguno.</td>
            </tr>
        @endforelse
        {{ $proveedores->links() }} <!-- Controles de paginación -->
    </tbody>
</table>

