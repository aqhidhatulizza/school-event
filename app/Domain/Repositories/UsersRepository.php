<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Users;
use Illuminate\Support\Facades\Log;

class UsersRepository extends AbstractRepository implements Paginable, Crudable
{

    protected $cache;

    public function __construct(Users $users, Cacheable $cache)
    {
        $this->model = $users;
        $this->cache = $cache;
    }

    public function find($id, array $columns = ['*'])
    {
        // set key
        $key = 'users-find' . $id;
        // has section and key
        if ($this->cache->has(Users::$tags, $key)) {
            return $this->cache->get(Users::$tags, $key);
        }
        // query to sql
        $users = parent::find($id, $columns);
        // store to cache
        $this->cache->put(Users::$tags, $key, $users, 10);
        return $users;
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
            $users = parent::create(
                [
                    'nama'     => e($data['nama']),
                    'email'    => e($data['email']),
                    'password' => bcrypt(e($data['password'])),

                ]
            );
            // flush cache with tags
            $this->cache->flush(Users::$tags);
            return $users;
        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . UsersRepository::class . ' method : create | ' . $e);
            return $this->createError();
        }
    }

    public function update($id, array $data)
    {
        try {
            $users = parent::update($id, [
                'nama'     => e($data['nama']),
                'email'    => e($data['email']),
                'password' => bcrypt(e($data['password'])),

            ]);
            // flush cache with tags
            $this->cache->flush(Users::$tags);
            return $users;
        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . UsersRepository::class . ' method : update | ' . $e);
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
            $users = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(Users::$tags);
            return $users;
        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . UsersRepository::class . ' method : delete | ' . $e);
            return $this->createError();
        }
    }


    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // set key
        $key = 'users-get-by-page' . $limit . $page . $search;
        // has section and key
        if ($this->cache->has(Users::$tags, $key)) {
            return $this->cache->get(Users::$tags, $key);
        }
        // query to sql
        $users = parent::getByPage($limit, $page, $column, 'nama', $search);
        // store to cache
        $this->cache->put(Users::$tags, $key, $users, 10);
        return $users;
    }
}