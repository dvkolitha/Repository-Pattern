<?php
namespace App\Interfaces;

interface BaseRepositoryInterface 
{
	public function create(array $attributes);
	public function find($id);
	public function delete($id);
}