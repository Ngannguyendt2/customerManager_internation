<?php


namespace App\Http\Repositories;


interface RepositoryInterface
{
public function getAll();
public function getId($id);
public function save($object);
public function delete($object);
public function create($object);
public function update($object);
}
