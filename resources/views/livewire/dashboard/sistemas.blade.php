<style>
    .custom-select {
        position: relative;
        display: inline-block;
        width: 150px; /* Ajusta el ancho según tus necesidades */
    }

    .custom-select select {
        display: ; /* Oculta el select original */
    }

    .select-selected {
        background-color: #eee;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .select-selected:after {
        position: absolute;
        content: "\25BC"; /* Flecha hacia abajo */
        top: 14px;
        right: 10px;
        font-size: 12px; /* Tamaño de la flecha */
    }

    .select-selected:hover {
        background-color: #ccc;
    }

    .select-items {
        position: absolute;
        background-color: #fff;
        border: 1px solid #000;
        border-top: none;
        border-radius: 0 0 4px 4px;
        z-index: 99;
        top: 100%;
        left: 0;
        right: 0;
    }

    .select-items div {
        padding: 8px 16px;
        cursor: pointer;
    }

    .select-items div:hover {
        background-color: #ccc;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div>
    Dashboard Sistemas
</div>
<table>
    <tr class="datosT text-center ">
        <td class="py-2">
            <button class="botonPV" wire:click="abrirModal(1)">
                <img src="https://raw.githubusercontent.com/AngelManuelCerecedo/LOGO-CBTIS/main/lupa.png">
                    Productos
            </button>
        </td>
        <td class="">
            <button class="botonPV" wire:click="abrirModal(2)">
                <img src="https://raw.githubusercontent.com/AngelManuelCerecedo/LOGO-CBTIS/main/persona.png">
                    Almacenes
            </button>
        </td>
    </tr>
    <tr class="datosT text-center">
        <td class="py-2">
            <button class="botonPV " wire:click="abrirModal(3)">
                <img src="https://raw.githubusercontent.com/AngelManuelCerecedo/LOGO-CBTIS/main/recibo.png">
                    Traspasos
            </button>
        </td>
        <td class="">
            <button class="botonPV " wire:click="abrirModal(4)">
                <img src="https://raw.githubusercontent.com/AngelManuelCerecedo/LOGO-CBTIS/main/venta.png">
                    Ventas
            </button>
        </td>
        </tr>
    <tr class="datosT text-center">
        <td class="">
            <button class="botonPV " wire:click="abrirModal(6)">
                Traspasos
            </button>
        </td>
        <td class="">
            <button class="botonPV " wire:click="abrirModal(7)">
                Creditos
            </button>
        </td>
    </tr>
</table>

