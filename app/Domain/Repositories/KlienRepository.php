<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Klien;
use Illuminate\Support\Facades\Log;

class KlienRepository extends AbstractRepository implements Paginable, Crudable
{

    protected $cache;

    public function __construct(Klien $klien, Cacheable $cache)
    {
        $this->model = $klien;
        $this->cache = $cache;
    }

    public function find($id, array $columns = ['*'])
    {
        // set key
        $key = 'klien-find' . $id;
        // has section and key
        if ($this->cache->has(Klien::$tags, $key)) {
            return $this->cache->get(Klien::$tags, $key);
        }
        // query to sql
        $klien = parent::find($id, $columns);
        // store to cache
        $this->cache->put(Klien::$tags, $key, $klien, 10);
        return $klien;
    }

    /**
     * Store a new Record
     *
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {
        try {
            $klien = parent::create(
                [
                    'nama'   => e($data['nama']),
                    'email'  => e($data['email']),
                    'status' => e($data['status']),
                    'no_hp'  => e($data['no_hp']),

                ]
            );
            // flush cache with tags
            $this->cache->flush(Klien::$tags);
            return $klien;
        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . KlienRepository::class . ' method : create | ' . $e);
            return $this->createError();
        }
    }

    public function update($id, array $data)
    {
        try {
            $klien = parent::update($id, [
                'nama'   => e($data['nama']),
                'email'  => e($data['email']),
                'status' => e($data['status']),
                'no_hp'  => e($data['no_hp']),

            ]);
            // flush cache with tags
            $this->cache->flush(Klien::$tags);
            return $klien;
        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . KlienRepository::class . ' method : update | ' . $e);
            return $this->createError();
        }
    }

    /**
     * Delete a record
     *
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        try {
            $klien = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(Klien::$tags);
            return $klien;
        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . KlienRepository::class . ' method : delete | ' . $e);
            return $this->createError();
        }
    }


    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // set key
        $key = 'klien-get-by-page' . $limit . $page . $search;
        // has section and key
        if ($this->cache->has(Klien::$tags, $key)) {
            return $this->cache->get(Klien::$tags, $key);
        }
        // query to sql
//        $event = parent::getByPage($limit, $page, $column, 'nama', $search);
        $klien = $this->model
            ->where('nama', 'like', '%' . $search . '%')
            ->paginate($limit)
            ->toArray();

        // store to cache
//        $this->cache->put(Klien::$tags, $key, $klien, 10);

        return $klien;
    }
}