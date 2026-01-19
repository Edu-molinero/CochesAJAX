<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coches - Portada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
    .coche-card {
        transition: transform 0.2s;
    }

    .coche-card:hover {
        transform: scale(1.05);
    }

    .coche-img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .categoria-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 10;
    }
    </style>

</head>

<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="bi bi-car-front"></i> Catálogo de Coches
            </a>
            <div>
                <button class="btn btn-outline-light btn-sm me-2" data-bs-toggle="modal" data-bs-target="#modalCategorias">
                    <i class="bi bi-tags"></i> Categorías
                </button>
                <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#modalCoches">
                    <i class="bi bi-gear"></i> Coches
                </button>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <h5 class="mb-0">
                                    <i class="bi bi-funnel"></i> Filtrar por categoría:
                                </h5>
                            </div>
                            <div class="col-md-9">
                                <select class="form-select form-select-lg" id="categoriaSelect"
                                    onchange="cargarCochesPorCategoria()">
                                    <option value="">Todas las categorías</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="areaCoches">

        </div>

        <div class="text-center py-5 d-none" id="cargandoCoches">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <p class="mt-3 text-muted">Cargando coches...</p>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; 2025 Catálogo de Coches - Ejemplo didáctico de AJAX con Fetch API</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Catálogo AJAX de Coches - Carga dinámica sin recargar página
    // Sistema de filtrado por categoría y panel de administración con modales
    
    // Cargar todos los coches al iniciar
    document.addEventListener('DOMContentLoaded', function() {
        cargarTodosCoches();
    });

    function mostrarCargando() {
        document.getElementById('cargandoCoches').classList.remove('d-none');
        document.getElementById('areaCoches').innerHTML = '';
    }

    function ocultarCargando() {
        document.getElementById('cargandoCoches').classList.add('d-none');
    }

    // Función para cargar todos los coches
    async function cargarTodosCoches() {
        try {
            mostrarCargando();
            const response = await fetch('/api/coches');

            if (!response.ok) {
                throw new Error('Error al cargar los coches');
            }

            const coches = await response.json();
            mostrarCoches(coches, 'Todos los Coches');
        } catch (error) {
            console.error('Error:', error);
            mostrarError('No se pudieron cargar los coches');
        } finally {
            ocultarCargando();
        }
    }

    // Función para cargar coches por categoría
    async function cargarCochesPorCategoria() {
        const categoriaSelect = document.getElementById('categoriaSelect');
        const categoriaId = categoriaSelect.value;

        try {
            mostrarCargando();
            let url = '/api/coches';
            if (categoriaId) {
                url += '?categoria_id=' + categoriaId;
            }

            const response = await fetch(url);

            if (!response.ok) {
                throw new Error('Error al cargar los coches');
            }

            const coches = await response.json();
            const categoriaNombre = categoriaSelect.options[categoriaSelect.selectedIndex].text;
            mostrarCoches(coches, categoriaNombre);
        } catch (error) {
            console.error('Error:', error);
            mostrarError('No se pudieron cargar los coches');
        } finally {
            ocultarCargando();
        }
    }

    // Función para mostrar coches en tarjetas
    function mostrarCoches(coches, titulo) {
        const areaCoches = document.getElementById('areaCoches');

        if (coches.length === 0) {
            areaCoches.innerHTML = `
            <div class="alert alert-info text-center" role="alert">
                <i class="bi bi-info-circle fs-1"></i>
                <h4 class="mt-3">No hay vehículos en esta categoría</h4>
                <p>Seleccione otra categoría o añada nuevos vehículos desde el panel de administración.</p>
            </div>
        `;
            return;
        }

        let html = `
        <div class="mb-4">
            <h2 class="text-center">
                <i class="bi bi-speedometer2"></i> ${titulo}
                <span class="badge bg-primary">${coches.length}</span>
            </h2>
        </div>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
    `;

        coches.forEach(coche => {
            const imagenUrl = coche.imagen || 'https://placeholder.co/300x400?text=Sin+Imagen';
            const categoriaNombre = coche.categoria ? coche.categoria.nombre : 'Sin categoría';

            html += `
            <div class="col">
                <div class="card h-100 shadow coche-card">
                    <div class="position-relative">
                        <span class="badge bg-info categoria-badge">${categoriaNombre}</span>
                        <img src="${imagenUrl}" class="card-img-top coche-img" alt="${coche.modelo}"
                             onerror="this.src='https://placeholder.co/300x400?text=Error+al+cargar'"
                             loading="lazy">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">${coche.modelo}</h5>
                        <p class="card-text text-muted">${coche.marca}</p>
                    </div>
                </div>
            </div>
        `;
        });

        html += `</div>`;
        areaCoches.innerHTML = html;
    }

    function mostrarError(mensaje) {
        const areaCoches = document.getElementById('areaCoches');
        areaCoches.innerHTML = `
        <div class="alert alert-danger text-center" role="alert">
            <i class="bi bi-exclamation-triangle fs-1"></i>
            <h4 class="mt-3">Error</h4>
            <p>${mensaje}</p>
            <button class="btn btn-danger" onclick="cargarTodosCoches()">
                <i class="bi bi-arrow-clockwise"></i> Reintentar
            </button>
        </div>
    `;
    }
    // Funciones para gestionar categorías y coches en tiempo real

    // Cargar categorías en modal
    async function cargarCategorias() {
        try {
            const response = await fetch('/api/categorias');
            const categorias = await response.json();
            
            let html = '<table class="table table-striped"><tbody>';
            categorias.forEach(cat => {
                html += `
                    <tr>
                        <td>${cat.nombre}</td>
                        <td>
                            <button class="btn btn-sm btn-danger" onclick="borrarCategoria(${cat.id})">
                                <i class="bi bi-trash"></i> Borrar
                            </button>
                        </td>
                    </tr>
                `;
            });
            html += '</tbody></table>';
            document.getElementById('listaCategorias').innerHTML = html;
        } catch (error) {
            console.error('Error:', error);
            alert('Error al cargar categorías');
        }
    }

    // Añadir nueva categoría
    async function anadirCategoria() {
        const nombre = document.getElementById('nombreCategoria').value.trim();
        if (!nombre) {
            alert('El nombre no puede estar vacío');
            return;
        }

        try {
            const response = await fetch('/api/categorias', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({ nombre })
            });

            if (!response.ok) throw new Error('Error al crear categoría');
            
            document.getElementById('nombreCategoria').value = '';
            cargarCategorias();
            alert('Categoría añadida correctamente');
        } catch (error) {
            console.error('Error:', error);
            alert('Error al añadir categoría');
        }
    }

    // Borrar categoría
    async function borrarCategoria(id) {
        if (!confirm('¿Estás seguro de que quieres borrar esta categoría?')) return;

        try {
            const response = await fetch(`/api/categorias/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                }
            });

            if (!response.ok) throw new Error('Error al borrar categoría');
            
            cargarCategorias();
            alert('Categoría borrada correctamente');
        } catch (error) {
            console.error('Error:', error);
            alert('Error al borrar categoría');
        }
    }

    // Cargar coches en modal
    async function cargarCochesAdmin() {
        try {
            const response = await fetch('/api/coches');
            const coches = await response.json();
            
            let html = '<table class="table table-striped table-sm"><tbody>';
            coches.forEach(coche => {
                html += `
                    <tr>
                        <td><strong>${coche.modelo}</strong></td>
                        <td>${coche.marca}</td>
                        <td>${coche.categoria?.nombre || 'N/A'}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="editarCoche(${coche.id})">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="borrarCoche(${coche.id})">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
            html += '</tbody></table>';
            document.getElementById('listaCoches').innerHTML = html;
        } catch (error) {
            console.error('Error:', error);
            alert('Error al cargar coches');
        }
    }

    // Borrar coche
    async function borrarCoche(id) {
        if (!confirm('¿Estás seguro de que quieres borrar este coche?')) return;

        try {
            const response = await fetch(`/api/coches/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                }
            });

            if (!response.ok) throw new Error('Error al borrar coche');
            
            cargarCochesAdmin();
            cargarTodosCoches();
            alert('Coche borrado correctamente');
        } catch (error) {
            console.error('Error:', error);
            alert('Error al borrar coche');
        }
    }

    // Inicializar modales
    document.addEventListener('DOMContentLoaded', function() {
        cargarTodosCoches();
        
        const modalCategorias = document.getElementById('modalCategorias');
        if (modalCategorias) {
            modalCategorias.addEventListener('show.bs.modal', cargarCategorias);
        }
        
        const modalCoches = document.getElementById('modalCoches');
        if (modalCoches) {
            modalCoches.addEventListener('show.bs.modal', cargarCochesAdmin);
        }
    });
        
    </script>

    <!-- Modal Categorías -->
    <div class="modal fade" id="modalCategorias" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gestionar Categorías</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nueva Categoría</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nombreCategoria" placeholder="Nombre de la categoría">
                            <button class="btn btn-primary" onclick="anadirCategoria()">
                                <i class="bi bi-plus-circle"></i> Añadir
                            </button>
                        </div>
                    </div>
                    <div id="listaCategorias"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Coches -->
    <div class="modal fade" id="modalCoches" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gestionar Coches</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="listaCoches"></div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>