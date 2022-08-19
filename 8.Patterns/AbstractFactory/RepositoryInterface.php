<?php

interface RepositoryInterface {

    public function set($params);

    public function getAll();

    public function search($params);
}