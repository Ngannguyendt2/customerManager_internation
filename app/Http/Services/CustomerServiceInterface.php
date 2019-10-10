<?php


namespace App\Http\Services;


interface CustomerServiceInterface
{
public function getAll();
public function getId($id);
public function save($object);
public function create($request);
public function delete($object);
public function update($request,$object);
}
