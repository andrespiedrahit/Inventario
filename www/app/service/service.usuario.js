angular.module('Inventario').service('registroUsuarioService', ['$http', function($http){
    
    this.agregarUsu = function (data) {
      return $http.post('http://localhost/Inventario/www/server.php/agregarUsuario', $.param(data));
    };

    this.obtenerUsu = $http.get('http://localhost/Inventario/www/server.php/obtenerUsuario');
    
    this.editarUsu = function (data) {
      return $http.post('http://localhost/Inventario/www/server.php/editarUsuario', $.param(data));
    };
    
    this.eliminarUsu = function (data) {
      return $http.post('http://localhost/Inventario/www/server.php/eliminarUsuario', $.param(data));
    };
    
    this.agregarArt = function (data) {
      return $http.post('http://localhost/Inventario/www/server.php/agregarArticulo', $.param(data));
    };
    
    this.obtenerArt = $http.get('http://localhost/Inventario/www/server.php/obtenerArticulo');
    
    this.editarArt = function (data) {
      return $http.post('http://localhost/Inventario/www/server.php/editarArticulo', $.param(data));
    };
    
    this.eliminarArt = function (data) {
      return $http.post('http://localhost/Inventario/www/server.php/eliminarArticulo', $.param(data));
    };
}]);