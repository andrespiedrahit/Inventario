<?php

class articuloDAO extends dataSource implements Iarticulo {

  public function delete($id, $logico = true) {
	if ($logico === true) {
	  $sql = 'UPDATE inventario SET inv_deleted_at = now() WHERE inv_id = :id';
	  $params = array(
		  ':id' => $id
	  );
	  return $this->execute($sql, $params);
	} else if ($logico === false) {
	  $sql = 'DELETE FROM inventario WHERE inv_id = :id AND inv_deleted_at IS NULL';
	  $params = array(
		  ':id' => (integer) $id
	  );
	  return $this->execute($sql, $params);
	}
  }

  public function insert(\articulo $articulo) {
	$sql = 'INSERT INTO inventario (inv_codigo, inv_nombre, inv_descripcion,inv_cantida) VALUES (:codigo, :nombre, :descripcion,:cantida)';
	$params = array(
		':codigo' => $articulo->getCodigo(),
		':nombre' => $articulo->getNombre(),
		':descripcion' => $articulo->getDescripcion(),
                ':cantida'=>$articulo->getCantidad()
	);
	return $this->execute($sql, $params);
  }

  public function search($codigo) {
	$sql = 'SELECT inv_id, inv_codigo, inv_nombre, inv_descripcion, inv_cantida FROM inventario WHERE inv_codigo = :codigo';
	$params = array(
		':codigo' => $codigo
	);
	return $this->query($sql, $params);
  }

  public function select() {
	$sql = 'SELECT inv_id, inv_codigo, inv_nombre, inv_descripcion, inv_cantida, inv_created_at FROM inventario WHERE inv_deleted_at IS NULL';
	return $this->query($sql);
  }

  public function selectById($id) {
	$sql = 'SELECT inv_id, inv_codigo, inv_nombre, inv_descripcion,inv_cantida FROM inventario WHERE inv_id = :id';
	$params = array(
		':id' => $id
	);
	return $this->query($sql, $params);
  }

  public function update(\articulo $articulo) {
	$sql = 'UPDATE inventario SET inv_codigo = :codigo, inv_nombre = :nombre, inv_descripcion = :descripcion, inv_cantida =:cantida WHERE inv_id = :id';
	$params = array(
		':codigo' => $articulo->getCodigo(),
		':nombre' => $articulo->getNombre(),
		':descripcion' => $articulo->getDescripcion(),
                ':cantida'=>$articulo->getCantidad(),
		':id' => $articulo->getId()
	);
	return $this->execute($sql, $params);
  }

}
