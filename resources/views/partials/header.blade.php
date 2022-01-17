<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars08" aria-controls="navbars08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbars08">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">TEST</a>
          </li>
         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Clientes</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="{{route('clientes.index')}}">Clientes</a></li>
              <li><a class="dropdown-item" href="{{route('clientes.create')}}">Crear Nuevo Cliente</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown" aria-expanded="false">Proveedores</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown02">
              <li><a class="dropdown-item" href="{{route('proveedores.index')}}">Proveedores</a></li>
              <li><a class="dropdown-item" href="{{route('proveedores.create')}}">Crear Nuevo Proveedor</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('moneda')}}">Monedas</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>