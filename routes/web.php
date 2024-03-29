<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\MovimientosController;
use App\Http\Controllers\ConsultaProductoController;
use App\Http\Controllers\DetalleMovimientoController;
use App\Http\Controllers\AutorizacionController;
use App\Http\Controllers\BuscarProductoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\HistorialFacturaController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\HomeBodeguistaController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\MiPerfilController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::view('/', 'index')->name('index');
// Route::view('/login', 'login')->name('login');

Route::get('/ingreso', function () {
    return view('auth/login');
})->name('login.vista');

Route::get('/', function () {
    return view('welcome');
});


// RUTA PARA ACCESO NO AUTORIZADO ERROR 401
Route::get('/error401', function () {
    return view('Acceso_no_autorizado');
})->middleware(['auth', 'verified'])->name('error401');

Route::get('/administrador/home', [HomeAdminController::class, '__invoke'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('administrador');

Route::get('/bodeguista/home', [HomeBodeguistaController::class, '__invoke'])
->middleware(['auth', 'verified'])->middleware('role:3')->name('bodeguista');

Route::get('/vendedor/home', [FacturaController::class, 'index'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('vendedor');

Route::get('/mi_perfil', [MiPerfilController::class, 'index'])
->middleware(['auth', 'verified'])->name('mi_perfil');

Route::post('/mi_perfil', [MiPerfilController::class, 'update'])
->middleware(['auth', 'verified'])->name('mi_perfil.update');




// Gestion de Usuarios Controller

Route::get('/gestion_usuario',[UsuariosController::class, 'index'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('gestion_usuario.index');

Route::post('gestion_usuario',[UsuariosController::class, 'show'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('gestion_usuario.show');

Route::get('/editar_usuario{id}',[UsuariosController::class, 'edit'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('gestion_usuario.edit');

Route::post('/editar_usuario{id}',[UsuariosController::class, 'update'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('gestion_usuario.update');

Route::post('/gestion_usuario/{id}',[UsuariosController::class, 'destroy'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('gestion_usuario.destroy');


// Gestion de inventario Controller

Route::get('/gestion_inventario',[InventarioController::class, 'index'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_inventario.index');

Route::post('/gestion_inventario',[InventarioController::class, 'show'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_inventario.show');

Route::get('/gestion_inventario/crear_producto',[InventarioController::class, 'create'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_inventario.create');

Route::post('/gestion_inventario/crear_producto',[InventarioController::class, 'store'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_inventario.store');

Route::get('/gestion_inventario/editar_producto/{id}',[InventarioController::class, 'edit'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_inventario.edit');

Route::post('/gestion_inventario/editar_producto/{id}',[InventarioController::class, 'update'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_inventario.update');

Route::post('/gestion_inventario/{id}',[InventarioController::class, 'destroy'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_inventario.destroy');

// Gestion de Reportes

Route::get('/reportes',[ReportesController::class, '__invoke'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('reportes.invoke');

Route::get('/reportes/productos_mas_vendidos',[ReportesController::class, 'productos_mas_vendidos'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('reportes.productos_mas_vendidos');

Route::get('/reportes/vendedores',[ReportesController::class, 'vendedores'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('reportes.vendedores');

// Gestion de Autorizaciones Controller

Route::get('/autorizaciones',[AutorizacionController::class, 'index'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('autorizacion.index');
Route::get('/autorizaciones/historial',[AutorizacionController::class, 'show'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('autorizacion.show');
Route::get('/autorizaciones/{id}',[AutorizacionController::class, 'store'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('autorizacion.store');
Route::post('/autorizaciones/{id}',[AutorizacionController::class, 'update'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('autorizacion.update');



// Gestion de Movimientos de mercancia Controller

Route::get('/gestion_movimientos',[MovimientosController::class, 'index'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_movimientos.index');

Route::post('/gestion_movimientos',[MovimientosController::class, 'show'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_movimientos.show');

Route::get('/gestion_movimientos/crear_movimiento',[MovimientosController::class, 'create'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_movimiento.create');

Route::post('/gestion_movimientos/crear_movimiento',[MovimientosController::class, 'store'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_movimiento.store');

Route::post('/gestion_movimientos/{id}',[MovimientosController::class, 'destroy'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_movimiento.destroy');

Route::get('/gestion_movimientos/editar_movimiento/{id}',[MovimientosController::class, 'edit'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_movimiento.edit');

Route::post('/gestion_movimientos/editar_movimiento/{id}',[MovimientosController::class, 'update'])
->middleware(['auth', 'verified'])->middleware('role:1,3')->name('gestion_movimiento.update');


// Detalle Movimiento

Route::post('/gestion_movimientos/detalle_movimiento/{id}',[DetalleMovimientoController::class, '__invoke'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('detalle_movimiento.invoke');


// Gestion de busqueda de productos para agregar a Movimientos de mercancia 

Route::get('/gestion_movimientos/crear_movimiento/buscar_productos',[ConsultaProductoController::class, 'index'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('consulta_producto.index');

Route::post('/gestion_movimientos/crear_movimiento/buscar_productos',[ConsultaProductoController::class, 'show'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('consulta_producto.show');

Route::post('/gestion_movimientos/crear_movimiento/buscar_productos/{id}',[ConsultaProductoController::class, 'create'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('consulta_producto.create');

Route::get('/gestion_movimientos/crear_movimiento/buscar_productos/{id}',[ConsultaProductoController::class, 'store'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('consulta_producto.store');

Route::post('/gestion_movimientos/crear_movimiento/buscar_productos/eliminar/{id}',[ConsultaProductoController::class, 'destroy'])
->middleware(['auth', 'verified'])->middleware('role:1')->name('consulta_producto.destroy');


// Modulo de ventas

Route::post('/vendedor/home', [FacturaController::class, 'edit'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('vendedor.edit');

Route::post('/vendedor/home/actualizar_producto', [FacturaController::class, 'update'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('vendedor.update');

Route::post('/vendedor/home/cambio', [FacturaController::class, 'show'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('vendedor.show');

Route::post('/vendedor/home/facturar', [FacturaController::class, 'store'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('vendedor.store');

Route::post('/vendedor/home/eliminar_producto', [FacturaController::class, 'create'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('vendedor.create');

Route::post('/vendedor/home/eliminar_factura/{id}', [FacturaController::class, 'destroy'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('vendedor.destroy');

Route::get('/vendedor/home/descargar_pdf', [FacturaController::class, 'downloadPDF'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('vendedor.downloadPDF');

// Buscar producto VENTAS

Route::get('/buscar_productos',[BuscarProductoController::class, 'index'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('buscar_producto.index');

Route::post('/buscar_productos',[BuscarProductoController::class, 'show'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('buscar_producto.show');

// Historial de facturas VENTAS

Route::get('/historial_facturas',[HistorialFacturaController::class, '__invoke'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('historial_facturas.invoke');

Route::post('/historial_facturas',[HistorialFacturaController::class, 'show'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('historial_facturas.show');

Route::post('/historial_facturas/detalle/{id}',[HistorialFacturaController::class, 'detalle_factura'])
->middleware(['auth', 'verified'])->middleware('role:2')->name('historial_facturas.detalle_factura');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
